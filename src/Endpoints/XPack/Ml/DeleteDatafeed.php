<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class DeleteDatafeed
 * Elasticsearch API name xpack.ml.delete_datafeed
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class DeleteDatafeed extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->datafeed_id) !== true) {
            throw new Exceptions\RuntimeException(
                'datafeed_id is required for delete_datafeed'
            );
        }
        $datafeed_id = $this->datafeed_id;

        return "/_xpack/ml/datafeeds/$datafeed_id";
    }

    public function getParamWhitelist(): array
    {
        return [
            'force'
        ];
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }
    
    public function setDeleteDatafeed($datafeed_id): DeleteDatafeed
    {
        if (isset($datafeed_id) !== true) {
            return $this;
        }
        $this->datafeed_id = $datafeed_id;

        return $this;
    }

}
