<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetFilters
 * Elasticsearch API name xpack.ml.get_filters
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetFilters extends AbstractEndpoint
{
    public function getURI(): string
    {
        $filter_id = $this->filter_id ?? null;

        if (isset($filter_id)) {
            return "/_xpack/ml/filters/$filter_id";
        }
        return "/_xpack/ml/filters";
    }

    public function getParamWhitelist(): array
    {
        return [
            'from',
            'size'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
    
    public function setFilterId($filter_id): GetFilters
    {
        if (isset($filter_id) !== true) {
            return $this;
        }
        $this->filter_id = $filter_id;

        return $this;
    }

}
