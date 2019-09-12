<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Graph;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Explore
 * Elasticsearch API name xpack.graph.explore
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Graph
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Explore extends AbstractEndpoint
{
    public function getURI(): string
    {
        $index = $this->index ?? null;
        $type = $this->type ?? null;

        if (isset($index) && isset($type)) {
            return "/$index/$type/_xpack/graph/_explore";
        }
        if (isset($index)) {
            return "/$index/_xpack/graph/_explore";
        }
    }

    public function getParamWhitelist(): array
    {
        return [
            'routing',
            'timeout'
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
    
    public function setBody($body): Explore
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

}
