<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class PostData
 * Elasticsearch API name xpack.ml.post_data
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class PostData extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->job_id) !== true) {
            throw new Exceptions\RuntimeException(
                'job_id is required for post_data'
            );
        }
        $job_id = $this->job_id;

        return "/_xpack/ml/anomaly_detectors/$job_id/_data";
    }

    public function getParamWhitelist(): array
    {
        return [
            'reset_start',
            'reset_end'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
    public function setBody($body): PostData
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setJobId($job_id): PostData
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;

        return $this;
    }

}
