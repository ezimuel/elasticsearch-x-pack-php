<?php
declare(strict_types = 1);

namespace Elasticsearch;

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
use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;

/**
 * Class XPack
 *
 * @category Elasticsearch
 * @package  Elasticsearch
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class XPack
{
    protected $graph;
    protected $license;
    protected $migration;
    protected $ml;
    protected $monitoring;
    protected $rollup;
    protected $security;
    protected $sql;
    protected $ssl;
    protected $watcher;

    public function __construct(Transport $transport, SerializerInterface $serializer)
    {
        $this->graph      = new GraphNamespace($transport, null);
        $this->license    = new LicenseNamespace($transport, null);
        $this->migration  = new MigrationNamespace($transport, null);
        $this->ml         = new MlNamespace($transport, null);
        $this->monitoring = new MonitoringNamespace($transport, null);
        $this->rollup     = new RollupNamespace($transport, null);
        $this->security   = new SecurityNamespace($transport, null);
        $this->sql        = new SqlNamespace($transport, null);
        $this->ssl        = new SslNamespace($transport, null);
        $this->watcher    = new WatcherNamespace($transport, null);
    }

    public function graph()
    {
        return $this->graph;
    }

    public function license()
    {
        return $this->license;
    }

    public function migration()
    {
        return $this->migration;
    }

    public function ml()
    {
        return $this->ml;
    }

    public function monitoring()
    {
        return $this->monitoring;
    }

    public function rollup()
    {
        return $this->rollup;
    }

    public function security()
    {
        return $this->security;
    }

    public function sql()
    {
        return $this->sql;
    }

    public function ssl()
    {
        return $this->ssl;
    }

    public function watcher()
    {
        return $this->watcher;
    }

    /**
     * Endpoint: xpack.info
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/info-api.html
     *
     * $params[
     *   'categories' => '(list) Comma-separated list of info categories. Can be any of: build, license, features'
     * ]
     */
    public function info(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('XPack\Info');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: xpack.usage
     *
     * Retrieve information about xpack features usage
     *
     * $params[
     *   'master_timeout' => '(time) Specify timeout for watch write operation'
     * ]
     */
    public function usage(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('XPack\Usage');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
}
