<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces\XPack;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class GraphNamespace
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\XPack
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GraphNamespace extends AbstractNamespace
{
    /**
     * Endpoint: xpack.graph.explore
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/graph-explore-api.html
     *
     * $params[
     *   'body'    => '(string) Graph Query DSL',
     *   'index'   => '(list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices',
     *   'type'    => '(list) A comma-separated list of document types to search; leave empty to perform the operation on all types',
     *   'routing' => '(string) Specific routing value',
     *   'timeout' => '(time) Explicit operation timeout',
     * ]
     */
    public function explore(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('XPack\Graph\Explore');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }

}
