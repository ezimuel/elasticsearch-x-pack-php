<?php

declare(strict_types = 1);

namespace Elasticsearch\XPack\IntegrationTests;

use PHPUnit\Framework\TestCase;
use Elasticsearch\XPack;

class YamlTest extends TestCase
{
    public function setUp()
    {
        $host = getenv('ES_TEST_HOST') ?? 'localhost:9200';

        $this->client = ClientBuilder::create()
            ->setHosts([$host])
            ->build();
    }
}
