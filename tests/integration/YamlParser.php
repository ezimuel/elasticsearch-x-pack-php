<?php
declare(strict_types = 1);

namespace Elasticsearch\IntegrationTests\XPack;

use Elasticsearch\Client;
use Elasticsearch\Common\Exceptions\ElasticsearchException;
use PHPUnit\Framework\TestCase;
use Spyc;

class YamlParser
{
    const LOG_PATH = __DIR__ . '/../log';
    const SUPPORTED_FEATURES = ['version', 'headers'];
    const CATCH_VALUES = [
        'bad_request'     => [400, 400],
        'unauthorized'    => [401, 401],
        'forbidden'       => [403, 403],
        'missing'         => [404, 404],
        'request_timeout' => [408, 408],
        'conflict'        => [409, 409],
        'unavailable'     => [503, 503],
        'request'         => [400, 500]
    ];

    protected $yaml;
    protected $client;
    protected $test;
    protected $setup = [];
    protected $teardown = [];
    protected $tests;
    protected $headers = [];
    protected $response;
    protected $esVersion;
    protected $catch;
    protected $is_true = [];
    protected $is_false = [];
    protected $set = [];
    
    public function __construct(string $file, YamlTest $test)
    {
        $this->yaml = Spyc::YAMLLoad($file, [
            'setting_empty_hash_as_object' => true
        ]);

        foreach ($this->yaml as $action => $steps) {
            switch ($action) {
                case 'setup':
                    $this->setup = $steps;
                    break;
                case 'teardown':
                    $this->teardown = $steps;
                    break;
                default:
                    $this->tests[$action] = $steps;
                    break;
            }
        }
        $this->file = $file;
        $this->test = $test;
    }

    protected function catch($value): void
    {
        $this->catch = self::CATCH_VALUES[$value] ?? $value;
    }

    protected function features($value): void
    {
        if (is_string($value)) {
            $value = [$value];
        }
        foreach ($value as $val) {
            if (!in_array($val, static::SUPPORTED_FEATURES)) {
                $this->test->markTestSkipped(sprintf(
                    "Missing feature %s",
                    $val
                ));
                break;
            }
        }
    }

    protected function version($value): void
    {
        if (preg_match('/^(.*) \- (.*)$/', $value, $matches[0])) {
            if ((!empty($matches[0]) && YamlTest::$esVersion < $matches[0]) ||
                (!empty($matches[1]) && YamlTest::$esVersion > $matches[1])) {
                $this->test->markTestSkipped(sprintf(
                    "Elastic version %s is not compatible with the test %s",
                    YamlTest::$esVersion,
                    $value
                ));
            }
        }
    }

    protected function resetResponse(): void
    {
        $this->response = null;
        $this->headers = [];
        $this->catch = null;
        $this->is_true = [];
        $this->is_false = [];
        $this->set = [];
    }

    protected function headers(array $value): void
    {
        $this->headers = array_merge($this->headers, $value);
    }

    protected function skip(array $actions): void
    {
        foreach ($actions as $act => $value)
        {
            if (method_exists($this, $act)) {
                $this->$act($value);
            }
        }
    }

    protected function warnings(array $actions): void
    {

    }

    protected function set(array $params): void
    {
        foreach ($params as $key => $value) {
            $this->set[$value] = $this->response[$key];
        }
    }

    protected function is_true(array $params): void
    {
        foreach ($params as $param) {
            $this->is_true[] = $param;
        }
    }

    protected function is_false(): void
    {
        foreach ($params as $param) {
            $this->is_false[] = $param;
        }
    }

    protected function do(array $actions): void
    {
        foreach ($actions as $action => $param) {
            if (method_exists($this, $action)) {
                $this->{$action}($param);
                continue;
            }

            // Remove endpoints with empty body and param (stdClass object)
            $param = (array) $param;

            $param['client'] = ['curl' => []];
            if (isset($param['ignore'])) {
                $param['client']['ignore'] = $param['ignore'];
                unset($param['ignore']);
            }
            // set custom headers
            if (!empty($this->headers)) {
                $auth = $this->headers['Authorization'] ?? null;
                if (null !== $auth) {
                    if (preg_match('/^Basic (.+)$/', $auth, $matches)) {
                        $param['client']['curl'][CURLOPT_USERPWD] = base64_decode($matches[1]);
                    }
                    unset($this->headers['Authorization']);
                }
                if (!empty($this->headers)) {
                    $param['client']['headers'] = $this->headers;
                }
            }
            // Add basic authentication
            if (!isset($param['client']['curl'][CURLOPT_USERPWD])) {
                $param['client']['curl'][CURLOPT_USERPWD] = 'elastic:changeme';
            }
            $param['client']['curl'][CURLOPT_HTTPAUTH] = CURLAUTH_BASIC;

            $parts = explode('.', $action);
            $namespace = $parts[0];
            if (isset($parts[2])) {
                $endpoint = self::getLowerCamelCase($parts[2]);
                $subnamespace = $parts[1];
                try {
                    $this->response = $this->test->client->$namespace()->$subnamespace()->$endpoint($param);
                } catch (ElasticsearchException $e) {
                    $this->catchResponseException($e);
                }
            } elseif (isset($parts[1])) {
                $endpoint = self::getLowerCamelCase($parts[1]);
                try {
                    $this->response = $this->test->client->$namespace()->$endpoint($param);
                } catch (ElasticsearchException $e) {
                    $this->catchResponseException($e);
                }
            } else {
                $endpoint = self::getLowerCamelCase($parts[0]);
                try {
                    $this->response = $this->test->client->$endpoint($param);
                } catch (ElasticsearchException $e) {
                    $this->catchResponseException($e);
                }
            }
            // check is_true/is_false
            foreach ($this->is_true as $param) {
                $this->test->assertTrue($this->response[$param]);
            }
            foreach ($this->is_false as $param) {
                $this->test->assertFalse($this->response[$param]);
            }
        }
    }

    protected function catchResponseException(ElasticsearchException $e)
    {
        if (isset($this->catch)) {
            if (is_array($this->catch)) {
                $this->test->assertThat(
                    $e->getCode(),
                    $this->test->logicalAnd(
                        $this->test->greaterThanOrEqual($this->catch[0]),
                        $this->test->lessThanOrEqual($this->catch[1])
                    )
                );
            } else {
                $json = json_decode($e->getMessage());
                $this->test->assertContains($this->catch, $json['error']['reason']);
            }
            return;
        }
        if (preg_match('/\/([^\/]+)\/([^\/]+)\.yml$/', $this->file, $matches)) {
            if (!file_exists(static::LOG_PATH . '/' . $matches[1])) {
                mkdir(static::LOG_PATH . '/' . $matches[1]);
            }
            $curl = $this->test->client->transport->getLastConnection()->getLastRequestInfo();
            $headers = '';
            foreach ($curl['request']['headers'] as $name => $value) {
                $headers .= sprintf("%s: %s\n", $name, implode(',', $value));
            }
            file_put_contents(
                sprintf("%s/%s/%s.log", static::LOG_PATH, $matches[1], $matches[2]),
                sprintf(
                    "REQUEST:\n%s\nRESPONSE:\n%s\n\nTEST:\n%s",
                    sprintf(
                        "Basic auth: %s\n%s %s %s\n%s\n\n%s\n",
                        $curl['request']['client']['curl'][CURLOPT_USERPWD] ?? 'NO',
                        $curl['request']['http_method'],
                        $curl['request']['scheme'],
                        $curl['request']['uri'],
                        $headers,
                        isset($curl['request']['body'])
                            ? json_encode(json_decode($curl['request']['body']), JSON_PRETTY_PRINT)
                            : ''
                    ),
                    json_encode(json_decode($e->getMessage()), JSON_PRETTY_PRINT),
                    file_get_contents($this->file)
                )
            );
        }
        throw $e;
    }

    protected function match(array $actions): void
    {
        foreach ($actions as $key => $value) {
            $this->test->assertEquals($this->getDotResponseValue($key), $value);
        }
    }

    protected function length(array $actions): void
    {
        foreach ($actions as $key => $value) {
            $responseValue = $this->getDotResponseValue($key);
            if (is_string($responseValue)) {
                $this->test->assertEquals($responseValue, $value);
            }
            if (is_array($responseValue)) {
                $this->test->assertCount($value, $responseValue);
            }
        }
    }

    protected function process(string $name, array $steps): void
    {
        foreach ($steps as $step) {
            foreach ($step as $key => $value) {
                if (method_exists($this, $key)) {
                    $this->{$key}($value);
                }
            }
        }
    }

    /**
     * @see https://github.com/elastic/elasticsearch/tree/6.3/rest-api-spec/src/main/resources/rest-api-spec/test#test-file-structure
     */
    public function executeTests(): void
    {
        foreach ($this->tests as $name => $tests) {
            $this->process('setup', $this->setup);
            $this->resetResponse();
            $this->process($name, $tests);
            $this->process('teardown', $this->teardown);

            $this->test->deleteIndices();
            $this->test->deleteTemplates();
        }
    }

    public static function getLowerCamelCase(string $name): string
    {
        return preg_replace_callback(
            '/_(.?)/',
            function($matches){
                return strtoupper($matches[1]);
            },
            $name
        );
    }

    protected function getDotResponseValue(string $dotName)
    {
        $dots = explode('.', $dotName); // managing dot syntax, e.g. "roles.0"
        $response = $this->response;
        foreach ($dots as $dot) {
            if (!isset($response[$dot])) {
                throw new \RuntimeException(sprintf(
                    "The %s value of %s does not exists in response",
                    $dot,
                    $dotName
                ));
            }
            $response = $response[$dot];
        }
        return $response;
    }
}
