<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class PutDatafeed
 * Elasticsearch API name xpack.ml.put_datafeed
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class PutDatafeed extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->datafeed_id) !== true) {
            throw new Exceptions\RuntimeException(
                'datafeed_id is required for put_datafeed'
            );
        }
        $datafeed_id = $this->datafeed_id;

        return "/_xpack/ml/datafeeds/$datafeed_id";
    }

    public function getParamWhitelist(): array
    {
        return [];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }
    
    public function setBody($body): PutDatafeed
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setDatafeedId($datafeed_id): PutDatafeed
    {
        if (isset($datafeed_id) !== true) {
            return $this;
        }
        $this->datafeed_id = $datafeed_id;

        return $this;
    }

}
