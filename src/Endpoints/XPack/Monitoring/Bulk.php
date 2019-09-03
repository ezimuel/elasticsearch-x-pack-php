<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Monitoring;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Bulk
 * Elasticsearch API name xpack.monitoring.bulk
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Monitoring
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Bulk extends AbstractEndpoint
{
    public function getURI(): string
    {
        $type = $this->type ?? null;

        if (isset($type)) {
            return "/_xpack/monitoring/$type/_bulk";
        }
        return "/_xpack/monitoring/_bulk";
    }

    public function getParamWhitelist(): array
    {
        return [
            'system_id',
            'system_api_version',
            'interval'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
    public function setBulk($body): Bulk
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

}
