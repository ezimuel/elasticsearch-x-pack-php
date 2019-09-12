<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Watcher;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Stats
 * Elasticsearch API name xpack.watcher.stats
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Watcher
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Stats extends AbstractEndpoint
{
    public function getURI(): string
    {
        $metric = $this->metric ?? null;

        if (isset($metric)) {
            return "/_xpack/watcher/stats/$metric";
        }
        return "/_xpack/watcher/stats";
    }

    public function getParamWhitelist(): array
    {
        return [
            'metric',
            'emit_stacktraces'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
    
    public function setMetric($metric): Stats
    {
        if (isset($metric) !== true) {
            return $this;
        }
        $this->metric = $metric;

        return $this;
    }

}
