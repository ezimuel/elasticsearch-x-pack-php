<?php
/**
* Generate the X-Pack endpoints and namespaces
*
* @author Enrico Zimuel (enrico.zimuel@elastic.co)
*/
declare(strict_types = 1);

use GitWrapper\GitWrapper;
use Elasticsearch\XPack\Util\Endpoint;
use Elasticsearch\XPack\Util\NamespaceEndpoint;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$start = microtime(true);
if (!isset($argv[1])) {
    print_usage_msg();
    exit(1);
}
if ($argv[1] < '6.3.0') {
    printf("Error: the version must be >= 6.3.0\n");
    exit(1);
}

$ver = $argv[1];
$version = 'v' . $ver;

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

$endpointDir = __DIR__ . '/../src/Endpoints/XPack/';
$countEndpoint = 0;
$namespaces = [];

// Generate endpoints
foreach ($files as $file) {
    if (empty($file)) {
        continue;
    }
    printf("Generation %s...", basename($file));

    $endpoint = new Endpoint($file, $git->run('show', [':' . trim($file)]), $ver);

    $dir = $endpointDir . ucfirst($endpoint->namespace);
    if (!file_exists($dir)) {
        mkdir($dir);
    }
    file_put_contents(
        sprintf("%s/%s.php", $dir, $endpoint->getClassName()),
        $endpoint->renderClass()
    );

    printf("done\n");

    $namespaces[$endpoint->namespace][] = $endpoint;
    $countEndpoint++;
}

// Generate namespaces
$namespaceDir = __DIR__ . '/../src/Namespaces/XPack/';
$countNamespace = 0;
foreach ($namespaces as $name => $endpoints) {
    $namespace = new NamespaceEndpoint($name, $ver);
    foreach ($endpoints as $ep) {
        $namespace->addEndpoint($ep);
    }
    file_put_contents(
        $namespaceDir . ucfirst($name) . 'Namespace.php',
        $namespace->renderClass()
    );
    $countNamespace++;
}

$end = microtime(true);
printf("\nGenerated %d endpoints and %d namespaces in %.3f seconds\n.", $countEndpoint, $countNamespace, $end - $start);
// End

function print_usage_msg(): void
{
    printf("Usage: php %s <ES_VERSION>\n", basename(__FILE__));
    printf("where <ES_VERSION> is the Elasticsearch version to check. The version must be >= 6.3.0.\n");
}
