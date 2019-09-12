<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class StartDatafeed
 * Elasticsearch API name xpack.ml.start_datafeed
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class StartDatafeed extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->datafeed_id) !== true) {
            throw new Exceptions\RuntimeException(
                'datafeed_id is required for start_datafeed'
            );
        }
        $datafeed_id = $this->datafeed_id;

        return "/_xpack/ml/datafeeds/$datafeed_id/_start";
    }

    public function getParamWhitelist(): array
    {
        return [
            'start',
            'end',
            'timeout'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
    public function setBody($body): StartDatafeed
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setDatafeedId($datafeed_id): StartDatafeed
    {
        if (isset($datafeed_id) !== true) {
            return $this;
        }
        $this->datafeed_id = $datafeed_id;

        return $this;
    }

}
