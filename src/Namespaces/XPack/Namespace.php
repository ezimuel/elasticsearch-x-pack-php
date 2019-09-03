<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces\XPack;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class Namespace
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\XPack
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
        $endpoint = $endpointBuilder('XPack\Info');
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
        $endpoint = $endpointBuilder('XPack\Usage');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

}
