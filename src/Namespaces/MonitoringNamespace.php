<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class MonitoringNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\XPack\Namespaces
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class MonitoringNamespace extends AbstractNamespace
{
    /**
     * Endpoint: xpack.monitoring.bulk
     *
     * @see http://www.elastic.co/guide/en/monitoring/current/appendix-api-bulk.html
     *
     * $params[
     *   'body'               => '(string) The operation definition and data (action-data pairs), separated by newlines (Required)',
     *   'type'               => '(string) Default document type for items which don't provide one',
     *   'system_id'          => '(string) Identifier of the monitored system',
     *   'system_api_version' => '(string) API Version of the monitored system',
     *   'interval'           => '(string) Collection interval (e.g., '10s' or '10000ms') of the payload',
     * ]
     */
    public function bulk(array $params = [])
    {
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('bulkclass');
        $endpoint->setParams($params);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }

}
