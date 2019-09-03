<?php
declare(strict_types = 1);

namespace Elasticsearch;

trait XPackTrait
{
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
