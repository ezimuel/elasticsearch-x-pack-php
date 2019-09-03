<?php
declare(strict_types = 1);

namespace Elasticsearch;

use Elasticsearch\Namespaces\AbstractNamespace;
use Elasticsearch\Namespaces\NamespaceBuilderInterface;
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
class XPack implements NamespaceBuilderInterface
{
    public function getName(): string
    {
        return 'xpack';
    }

    public function getObject(Transport $transport, SerializerInterface $serializer)
    {
        return new class($transport, $serializer) extends AbstractNamespace {
            use XPackTrait;

            public function __construct(Transport $transport, SerializerInterface $serializer)
            {
                $this->graph      = new GraphNamespace($transport, $endpoint);
                $this->license    = new LicenseNamespace($transport, $endpoint);
                $this->migration  = new MigrationNamespace($transport, $endpoint);
                $this->ml         = new MlNamespace($transport, $endpoint);
                $this->monitoring = new MonitoringNamespace($transport, $endpoint);
                $this->rollup     = new RollupNamespace($transport, $endpoint);
                $this->security   = new SecurityNamespace($transport, $endpoint);
                $this->sql        = new SqlNamespace($transport, $endpoint);
                $this->ssl        = new SslNamespace($transport, $endpoint);
                $this->watcher    = new WatcherNamespace($transport, $endpoint);
            }
        };
    }
}
