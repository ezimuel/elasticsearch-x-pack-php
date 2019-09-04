<?php

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use PHPUnit\Framework\TestCase;
use Elasticsearch\Namespaces\XPack\GraphNamespace;
use Elasticsearch\Namespaces\XPack\LicenseNamespace;
use Elasticsearch\Namespaces\XPack\MigrationNamespace;
use Elasticsearch\Namespaces\XPack\MlNamespace;
use Elasticsearch\Namespaces\XPack\MonitoringNamespace;
use Elasticsearch\Namespaces\XPack\RollupNamespace;
use Elasticsearch\Namespaces\XPack\SecurityNamespace;
use Elasticsearch\Namespaces\XPack\SqlNamespace;
use Elasticsearch\Namespaces\XPack\SslNamespace;
use Elasticsearch\Namespaces\XPack\WatcherNamespace;
use Elasticsearch\XPack;
use Elasticsearch\Namespaces\XPack\XPackNamespace;

class XPackTest extends TestCase
{
    public function testRegisterNamespace()
    {
        $client = ClientBuilder::create()
            ->registerNamespace(new XPackNamespace)
            ->build();

        $this->assertInstanceOf(Client::class, $client);
        $this->assertInstanceOf(XPack::class, $client->xpack());
    }

    public function getNamespaces()
    {
        return [
            ['graph'],
            ['license'],
            ['migration'],
            ['ml'],
            ['monitoring'],
            ['rollup'],
            ['security'],
            ['sql'],
            ['ssl'],
            ['watcher']
        ];
    }

    /**
     * @dataProvider getNamespaces
     */
    public function testNamespaces(string $namespace)
    {
        $client = ClientBuilder::create()
            ->registerNamespace(new XPackNamespace)
            ->build();

        $className = sprintf("Elasticsearch\\Namespaces\\XPack\\%sNamespace", $namespace);
        $this->assertInstanceOf($className, $client->xpack()->{$namespace}());
    }

    public function testInfoEndpointExists()
    {
        $client = ClientBuilder::create()
            ->registerNamespace(new XPackNamespace)
            ->build();

        $this->assertTrue(method_exists($client->xpack(), 'info'));
    }

    public function testUsageEndpointExists()
    {
        $client = ClientBuilder::create()
            ->registerNamespace(new XPackNamespace)
            ->build();

        $this->assertTrue(method_exists($client->xpack(), 'usage'));
    }
}
