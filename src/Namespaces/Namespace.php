<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class Namespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\XPack\Namespaces
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Namespace extends AbstractNamespace
{
    /**
     * Endpoint: xpack.info
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/info-api.html
     *
     * $params[
     *   'categories' => '(list) Comma-separated list of info categories. Can be any of: build, license, features',
     * ]
     */
    public function info(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('infoclass');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.usage
     *
     * @see Retrieve information about xpack features usage
     *
     * $params[
     *   'master_timeout' => '(time) Specify timeout for watch write operation',
     * ]
     */
    public function usage(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('usageclass');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

}
