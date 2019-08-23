<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class PutFilter
 * Generated by util/GenerateEndpoints.php
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class PutFilter extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->filter_id) !== true) {
            throw new Exceptions\RuntimeException(
                'filter_id is required for put_filter'
            );
        }
        $filter_id = $this->filter_id;

        if (isset($filter_id)) {
            return "/_xpack/ml/filters/$filter_id";
        }
    }

    public function getParamWhitelist(): array
    {
        return [
            
        ];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }
    
    public function setBody($body): PutFilter
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setFilterId($filter_id): PutFilter
    {
        if (isset($filter_id) !== true) {
            return $this;
        }
        $this->filter_id = $filter_id;

        return $this;
    }

}