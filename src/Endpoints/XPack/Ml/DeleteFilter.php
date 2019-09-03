<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class DeleteFilter
 * Elasticsearch API name xpack.ml.delete_filter
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class DeleteFilter extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->filter_id) !== true) {
            throw new Exceptions\RuntimeException(
                'filter_id is required for delete_filter'
            );
        }
        $filter_id = $this->filter_id;

        return "/_xpack/ml/filters/$filter_id";
    }

    public function getParamWhitelist(): array
    {
        return [];
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }
    
    public function setDeleteFilter($filter_id): DeleteFilter
    {
        if (isset($filter_id) !== true) {
            return $this;
        }
        $this->filter_id = $filter_id;

        return $this;
    }

}
