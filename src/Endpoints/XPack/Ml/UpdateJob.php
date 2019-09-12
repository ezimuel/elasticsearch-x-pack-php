<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class UpdateJob
 * Elasticsearch API name xpack.ml.update_job
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class UpdateJob extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->job_id) !== true) {
            throw new Exceptions\RuntimeException(
                'job_id is required for update_job'
            );
        }
        $job_id = $this->job_id;

        return "/_xpack/ml/anomaly_detectors/$job_id/_update";
    }

    public function getParamWhitelist(): array
    {
        return [];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
    public function setBody($body): UpdateJob
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setJobId($job_id): UpdateJob
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;

        return $this;
    }

}
