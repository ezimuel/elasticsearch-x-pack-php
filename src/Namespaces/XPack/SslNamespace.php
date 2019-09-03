<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces\XPack;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class SslNamespace
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\XPack
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class SslNamespace extends AbstractNamespace
{
        /**
     * Endpoint: xpack.ssl.certificates
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-ssl.html
     *
     */
    public function certificates(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('XPack\Ssl\Certificates');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

}
