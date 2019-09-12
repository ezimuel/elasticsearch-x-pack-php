<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Util;

use Exception;

class Endpoint
{
    const ENDPOINT_CLASS_TEMPLATE = __DIR__ . '/skeleton/endpoint-class';
    const REQUIRED_PART_TEMPLATE  = __DIR__ . '/skeleton/required-part';
    const SET_PART_TEMPLATE       = __DIR__ . '/skeleton/set-part';

    public $namespace;
    public $name;
    public $apiName;
    protected $content;
    protected $version;

    /**
     * @param $fileName name of the file with the API specification
     * @param $content content of the API specification in JSON
     * @param $version Elasticsearch version of the API specification
     */
    public function __construct(string $fileName, string $content, string $version)
    {
        $this->apiName = basename($fileName, '.json');
        $parts = explode('.', $fileName);
        if (count($parts) === 3) {
            $this->namespace = '';
            $this->name = $parts[1];
        } else {
            $this->namespace = $parts[1];
            $this->name = $parts[2];
        }
        try {
            $this->content = json_decode(
                $content,
                true,
                512,
                JSON_THROW_ON_ERROR
            );
        } catch (JsonException $e) {
            throw new Exception(sprintf(
                "The content of the endpoint is not JSON: %s\n",
                $e->getMessage()
            ));
        }
        $this->content = $this->content[$this->apiName];
        $this->version = $version;
    }

    public function getParts(): array
    {
        if (!isset($this->content['url']['parts'])) {
            return [];
        }
        return array_keys($this->content['url']['parts']);
    }

    public function getDocUrl(): string
    {
        return $this->content['documentation'] ?? '';
    }

    public function renderClass(): string
    {
        $class = file_get_contents(self::ENDPOINT_CLASS_TEMPLATE);

        $class = str_replace(
            ':uri',
            $this->extractUrl($this->content['url']),
            $class
        );
        $class = str_replace(
            ':params',
            $this->extractParameters(),
            $class
        );
        $class = str_replace(
            ':namespace',
            $this->namespace === ''
                ? ucfirst($this->namespace)
                : '\\' . ucfirst($this->namespace),
            $class
        );

        if (!empty($this->content['body']) &&
            ($this->content['methods'] === ['GET', 'POST'] || $this->content['methods'] === ['POST', 'GET'])) {
            $method = 'isset($this->body) ? \'POST\' : \'GET\'';
        } else {
            $method = "'{$this->content['methods'][0]}'";
        }
        $class = str_replace(':method', $method, $class);

        $parts = '';
        // Set parts
        if (!empty($this->content['body'])) {
            $parts .= $this->getSetPart('body', ucfirst($this->name));
        }
        if (isset($this->content['url']['parts'])) {
            foreach ($this->content['url']['parts'] as $part => $value) {
                if (in_array($part, ['type', 'index'])) {
                    continue;
                }
                $parts .= $this->getSetPart($part);
            }
        }
        $class = str_replace(':set-parts', $parts, $class);
        $class = str_replace(':endpoint', $this->getClassName(), $class);

        $class = str_replace(':version', $this->version, $class);
        return str_replace(':apiname', $this->apiName, $class);
    }

    public function getMethod(): array
    {
        return $this->content['methods'];
    }

    private function extractParameters(): string
    {
        if (!isset($this->content['url']['params'])) {
            return '';
        }
        $tab12 = str_repeat(' ', 12);
        $tab8 = str_repeat(' ', 8);
        $result = '';
        foreach (array_keys($this->content['url']['params']) as $param) {
            $result .=  "'$param',\n" . $tab12;
        }
        return "\n". $tab12 . rtrim(trim($result), ',') . "\n". $tab8;
    }

    private function extractUrl(array $url): string
    {
        $skeleton = file_get_contents(self::REQUIRED_PART_TEMPLATE);
        $checkPart = '';
        $params = '';

        $tab8 = str_repeat(' ', 8);
        $tab12 = str_repeat(' ', 12);

        $required = [];

        if (isset($url['parts'])) {
            foreach ($url['parts'] as $part => $value) {
                if (isset($value['required']) && $value['required']) {
                    $required[] = $part;
                    $checkPart .= str_replace(
                        ':endpoint',
                        $this->name,
                        str_replace(':part', $part, $skeleton)
                    );
                } else {
                    $params .= sprintf("%s\$%s = \$this->%s ?? null;\n", $tab8, $part, $part);
                }
            }
        }
        $else = '';
        $urls = '';
        rsort($url['paths']);

        foreach ($url['paths'] as $path) {
            $parts = $this->getPartsFromUrl($path);
            if (empty($parts)) {
                $else = sprintf("\n%sreturn \"%s\";", $tab8, $path);
                continue;
            }
            $check = '';
            if (!in_array($parts[0], $required)) {
                $check = sprintf("isset(\$%s)", $parts[0]);
            }
            $url = str_replace('{' . $parts[0] .'}', '$' . $parts[0], $path);
            for ($i=1; $i<count($parts); $i++) {
                $url = str_replace('{' . $parts[$i] .'}', '$' . $parts[$i], $url);
                if (in_array($parts[$i], $required)) {
                    continue;
                }
                $check .= sprintf("%sisset(\$%s)", empty($check) ? '' : ' && ', $parts[$i]);
            }
            if (empty($check)) {
                $urls .= sprintf("\n%sreturn \"%s\";", $tab8, $url);
            } else {
                $urls .= sprintf("\n%sif (%s) {\n%sreturn \"%s\";\n%s}", $tab8, $check, $tab12, $url, $tab8);
            }
        }
        return $checkPart . $params . $urls . $else;
    }

    private function getPartsFromUrl(string $url): array
    {
        preg_match_all('#\{([a-z_]+)\}#', $url, $match);
        return $match[1];
    }

    private function getSetPart(string $param): string
    {
        $setPart = file_get_contents(self::SET_PART_TEMPLATE);
        $setPart = str_replace(':endpoint', $this->getClassName(), $setPart);
        $setPart = str_replace(':part', $param, $setPart);

        return str_replace(':Part', $this->normalizeName($param), $setPart);
    }

    protected function normalizeName(string $name): string
    {
        return str_replace('_', '', ucwords($name, '_'));
    }

    public function getClassName(): string
    {
        return $this->normalizeName($this->name);
    }

    public function renderDocParams(): string
    {
        if (!isset($this->content['url']['params']) && !isset($this->content['url']['parts'])) {
            return '';
        }
        $space = $this->getMaxLengthBodyPartsParams();

        $result = "/**\n";
        $result .= "     * Endpoint: {$this->apiName}\n";
        if (isset($this->content['documentation'])) {
            $result .= "     *\n     * @see {$this->content['documentation']}\n     *\n";
        }

        $params  = "     * \$params[\n";
        $values  = $this->extractBodyDescription($space);
        $values .= $this->extractPartsDescription($space);
        $values .= $this->extractParamsDescription($space);
        $params .= $values . "     * ]\n     */";

        if (empty($values)) {
            return $result . "     */";
        }
        return $result . $params;
    }

    private function extractBodyDescription(int $space): string
    {
        if (isset($this->content['body']) && isset($this->content['body']['description'])) {
            return sprintf(
                "     *   'body' %s=> '(string) %s%s',\n",
                str_repeat(' ', $space - 4),
                $this->content['body']['description'],
                isset($this->content['body']['required']) && $this->content['body']['required'] ? ' (Required)' : ''
            );
        }
        return '';
    }

    private function extractPartsDescription(int $space): string
    {
        $result = '';
        if (!isset($this->content['url']['parts'])) {
            return $result;
        }
        foreach ($this->content['url']['parts'] as $part => $values) {
            $result .= sprintf(
                "     *   '%s' %s=> '(%s) %s%s',\n",
                $part,
                str_repeat(' ', $space - strlen($part)),
                $values['type'],
                $values['description'] ?? '',
                isset($values['required']) && $values['required'] ? ' (Required)' : ''
            );
        }
        return $result;
    }

    private function extractParamsDescription(int $space): string
    {
        $result = '';
        if (!isset($this->content['url']['params'])) {
            return $result;
        }
        foreach ($this->content['url']['params'] as $param => $values) {
            $result .= sprintf(
                "     *   '%s' %s=> '(%s) %s%s%s%s',\n",
                $param,
                str_repeat(' ', $space - strlen($param)),
                $values['type'],
                $values['description'] ?? '',
                isset($values['required']) && $values['required'] ? ' (Required)' : '',
                isset($values['options']) ? sprintf(" (Options = %s)", implode(',', $values['options'])) : '',
                isset($values['default']) ? sprintf(" (Default = %s)", $values['type'] === 'boolean' ? ($values['default'] ? 'true' : 'false') : $values['default']) : ''
            );
        }
        return $result;
    }

    private function getMaxLengthBodyPartsParams(): int
    {
        $max = isset($this->content['body']) ? 4 : 0;
        if (isset($this->content['url']['parts'])) {
            foreach ($this->content['url']['parts'] as $part => $values) {
                if (strlen($part) > $max) {
                    $max = strlen($part);
                }
            }
        }
        if (isset($this->content['url']['params'])) {
            foreach ($this->content['url']['params'] as $param => $values) {
                if (strlen($param) > $max) {
                    $max = strlen($param);
                }
            }
        }
        return $max;
    }

    public function isBodyNull(): bool
    {
        return empty($this->content['body']);
    }
}
