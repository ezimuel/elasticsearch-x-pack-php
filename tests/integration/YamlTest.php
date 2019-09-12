<?php
declare(strict_types = 1);

namespace Elasticsearch\IntegrationTests\XPack;

use Elasticsearch\ClientBuilder;
use Elasticsearch\Namespaces\XPackNamespace;
use GitWrapper\GitWrapper;
use PHPUnit\Framework\TestCase;

class YamlTest extends TestCase
{
    const ES_SOURCE_CODE = __DIR__ . '/../../util/elasticsearch';
    const YAML_TEST_DIR  = self::ES_SOURCE_CODE . '/x-pack/plugin/src/test/resources/rest-api-spec/test/';
    const CA_CERT        = __DIR__ . '/../../travis/certs/ca.crt';
    const ES_USER        = 'elastic';
    const ES_PASSWORD    = 'changeme';
    const MAX_RETRY      = 5;

    protected static $host;
    public $client;
    public static $esVersion;

    public static function setUpBeforeClass()
    {
        static::$host = getenv('ES_TEST_HOST');
        if (false === static::$host) {
            throw new \RuntimeException('You need to specify the Elasticsearch server with ES_TEST_HOST env var');
        }

        // Get the Elasticsearch version from the running server
        $response = static::execCurl(static::$host, 'GET');
        if (false === $response) {
            throw new \RuntimeException('I cannot connect to ES');
        }
        $response = json_decode($response, true);
        $esHash = $response['version']['build_hash'];
        self::$esVersion = $response['version'];
        if (empty($esHash)) {
            throw new \RuntimeException('I cannot get the build_hash from ES server');
        }

        // Get the Elasticsearch checkout version
        $gitWrapper = new GitWrapper();
        $git = $gitWrapper->workingCopy(static::ES_SOURCE_CODE);
        $result = $git->run('rev-parse', ['HEAD']);
        $headHash = substr($result, 0, strlen($esHash));

        if ($headHash !== $esHash) {
            throw new \RuntimeException(sprintf(
                "The elasticsearch build hash (%s) of YAML test is different from the running server (%s)",
                $headHash,
                $esHash
            ));
        }
    }

    public function setUp()
    {
        $this->client = ClientBuilder::create()
            ->registerNamespace(new XPackNamespace)
            ->setHosts([static::$host])
            ->setSSLVerification(false)
            ->build();
    }

    public function getYamlFiles()
    {
        $files = array_map(
            function($value){
                return [$value];
            },
            glob(realpath(static::YAML_TEST_DIR) . "/{,*/,*/*/}*.yml", GLOB_BRACE)
        );
        return $files;
        //return array_slice($files, 0, 2);
    }

    public function deleteIndices()
    {
        $response = static::execCurl(static::$host . '/*', 'DELETE');
    }

    public function deleteTemplates()
    {
        $response = static::execCurl(static::$host . '/_template/*', 'DELETE');
    }

    public function waitForYellow()
    {
        $i = 0;
        do {
            $response = static::execCurl(static::$host . '/_cluster/health?wait_for_status=yellow&timeout=50s', 'GET');
            if (false !== $response) {
                $response = json_decode($response, true);
            }
            $i++;
        } while (i <= static::MAX_RETRY && false !== $response && $response['status'] === 'red');
    }

    /**
     * Send a HTTP request using curl_exec()
     *
     * @return bool|string
     */
    protected static function execCurl(string $host, string $method)
    {
        $ch = curl_init($host);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_CAINFO, static::CA_CERT);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_USERPWD, static::ES_USER . ":" . static::ES_PASSWORD);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            printf("Request Error: %s\n", curl_error($ch));
            exit(1);
        }
        curl_close($ch);

        return $response;
    }

    /**
     * @dataProvider getYamlFiles
     */
    public function testIntegration(string $test)
    {
        //printf("TEST: %s\n", $test);
        $yamlParser = new YamlParser($test, $this);
        $yamlParser->executeTests();
    }
}
