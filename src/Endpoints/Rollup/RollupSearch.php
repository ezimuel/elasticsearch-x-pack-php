<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Rollup;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class RollupSearch
 * Generated by util/GenerateEndpoints.php
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Rollup
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class RollupSearch extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for rollup_search'
            );
        }
        $index = $this->index;
        $type = $this->type ?? null;

        if (isset($index) && isset($type)) {
            return "$index/$type/_rollup_search";
        }
        if (isset($index)) {
            return "$index/_rollup_search";
        }
    }

    public function getParamWhitelist(): array
    {
        return [
            
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
    
    public function setBody($body): RollupSearch
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

}