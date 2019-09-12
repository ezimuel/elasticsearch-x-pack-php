<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

use Elasticsearch\Namespaces\NamespaceBuilderInterface;
use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;
use Elasticsearch\XPack;

/**
 * Class XPackNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class XPackNamespace implements NamespaceBuilderInterface
{
    public function getName(): string
    {
        return 'xpack';
    }

    public function getObject(Transport $transport, SerializerInterface $serializer)
    {
        return new XPack($transport, $serializer);
    }
}
