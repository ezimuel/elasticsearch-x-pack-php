<?php
/**
* Generate the X-Pack API endpoints
*
* @author Enrico Zimuel (enrico.zimuel@elastic.co)
*/
declare(strict_types = 1);

use GitWrapper\GitWrapper;

require_once dirname(__DIR__) . '/vendor/autoload.php';

if (!isset($argv[1])) {
    print_usage_msg();
    exit(1);
}
if ($argv[1] < '6.3.0') {
    printf("Error: the version must be > 6.3.0\n");
    exit(1);
}

$version = 'v' . $argv[1];

$gitWrapper = new GitWrapper();
$git = $gitWrapper->workingCopy(dirname(__DIR__) . '/util/elasticsearch');

$git->run('fetch', ['--tags']);
$tags = explode("\n", $git->run('tag'));
if (!in_array($version, $tags)) {
    printf("Error: the version %s specified doesnot exist\n", $version);
    exit(1);
}

$git->run('checkout', [$version]);

$result = $git->run(
    'ls-files',
    [ "x-pack/plugin/src/test/resources/rest-api-spec/api/*.json" ]
);
$files = explode("\n", $result);

$endpointDir = __DIR__ . '/../src/Endpoints/';

foreach ($files as $file) {
    if (empty($file)) {
        continue;
    }

    $parts = explode('.', $file);
    if (count($parts) === 3) {
        $namespace = '';
        $endpoint = $parts[1];
    } else {
        $namespace = $parts[1];
        $endpoint = $parts[2];
    }

    try {
        printf("Reading %s\n", $file);

        $json = json_decode(
            $git->run('show', [':' . trim($file)]),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    } catch (JsonException $e) {
        printf("Error: %s\n", $e->getMessage());
        exit(1);
    }

    printf("Generating class Elasticsearch\Endpoints\%s\\%s...", ucfirst($namespace), getClassName($endpoint));

    $class = file_get_contents(__DIR__ . '/skeleton/class');

    $key = $namespace === '' ? "xpack.$endpoint" : "xpack.$namespace.$endpoint";

    $class = str_replace(':uri', extractUrl($json[$key]['url'], $endpoint), $class);
    $class = str_replace(':params', extractParameters($json[$key]), $class);
    $class = str_replace(':namespace', $namespace === '' ? ucfirst($namespace) : '\\' . ucfirst($namespace), $class);

    if (!empty($json[$key]['body']) && ($json[$key]['methods'] === ['GET', 'POST'] || $json[$key]['methods'] === ['POST', 'GET'])) {
        $method = 'isset($this->body) ? \'POST\' : \'GET\'';
    } else {
        $method = "'{$json[$key]['methods'][0]}'";
    }
    $class = str_replace(':method', $method, $class);

    $parts = '';
    // Set parts
    if (!empty($json[$key]['body'])) {
        $parts .= getSetPart('body', ucfirst($endpoint));
    }
    foreach ($json[$key]['url']['parts'] as $part => $value) {
        if (in_array($part, ['type', 'index'])) {
            continue;
        }
        $parts .= getSetPart($part, ucfirst($endpoint));
    }
    $class = str_replace(':set-parts', $parts, $class);

    $class = str_replace(':endpoint', getClassName($endpoint), $class);

    $dir = $endpointDir . ucfirst($namespace);
    if (!file_exists($dir)) {
        mkdir($dir);
    }
    file_put_contents($dir . '/' . getClassName($endpoint) . '.php', $class);

    printf(" done\n");
}

function print_usage_msg(): void
{
    printf("Usage: php %s <ES_VERSION>\n", basename(__FILE__));
    printf("where <ES_VERSION> is the Elasticsearch version to check. The version must be >= 6.3.0.\n");
}

function extractParameters(array $json): string
{
    if (!isset($json['url']['params'])) {
        return '';
    }
    $tab = str_repeat(' ', 12);
    $result = '';
    foreach (array_keys($json['url']['params']) as $param) {
        $result .=  "'$param'," . "\n" . $tab;
    }
    return rtrim(trim($result), ',');
}

function extractUrl(array $json, string $endpoint): string
{
    $skeleton = file_get_contents(__DIR__ . '/skeleton/required-part');
    $checkPart = '';
    $params = '';
    $tab = str_repeat(' ', 4);

    foreach ($json['parts'] as $part => $value) {
        if (isset($value['required']) && $value['required']) {
            $checkPart .= str_replace(
                ':endpoint',
                $endpoint,
                str_replace(':part', $part, $skeleton)
            );
        } else {
            $params .= sprintf("%s\$%s = \$this->%s ?? null;\n", $tab.$tab, $part, $part);
        }
    }
    $else = '';
    $urls = '';
    rsort($json['paths']);

    foreach ($json['paths'] as $path) {
        $parts = getPartsFromUrl($path);
        if (empty($parts)) {
            $else = sprintf("\n%sreturn \"%s\";", $tab.$tab, $path);
            continue;
        }
        $check = sprintf("isset(\$%s)", $parts[0]);
        $url = str_replace('{' . $parts[0] .'}', '$' . $parts[0], $path);
        for ($i=1; $i<count($parts); $i++) {
            $check .= sprintf(" && isset(\$%s)", $parts[$i]);
            $url =  str_replace('{' . $parts[$i] .'}', '$' . $parts[$i], $url);
        }
        $urls .= sprintf("\n%sif (%s) {\n%sreturn \"%s\";\n%s}", $tab.$tab, $check, $tab.$tab.$tab, $url, $tab.$tab);
    }
    return $checkPart . $params . $urls . $else;
}

function getPartsFromUrl(string $url): array
{
    preg_match_all('#\{([a-z_]+)\}#', $url, $match);
    return $match[1];
}

function getSetPart(string $part, string $endpoint): string
{
    $setPart = file_get_contents(__DIR__ . '/skeleton/set-part');
    $setPart = str_replace(':endpoint', getClassName($endpoint), $setPart);
    $setPart = str_replace(':part', $part, $setPart);
    $setPart = str_replace(':Part', getClassName($part), $setPart);

    return $setPart;
}

function getClassName(string $endpoint): string
{
    $endpoint = ucwords($endpoint, '_');
    return str_replace('_', '', $endpoint);
}
