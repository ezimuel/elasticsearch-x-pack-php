<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class OpenJob
 * Elasticsearch API name xpack.ml.open_job
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class OpenJob extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->job_id) !== true) {
            throw new Exceptions\RuntimeException(
                'job_id is required for open_job'
            );
        }
        $job_id = $this->job_id;
        $ignore_downtime = $this->ignore_downtime ?? null;
        $timeout = $this->timeout ?? null;

        return "/_xpack/ml/anomaly_detectors/$job_id/_open";
    }

    public function getParamWhitelist(): array
    {
        return [];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
    public function setOpenJob($job_id): OpenJob
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;

        return $this;
    }

    public function setOpenJob($ignore_downtime): OpenJob
    {
        if (isset($ignore_downtime) !== true) {
            return $this;
        }
        $this->ignore_downtime = $ignore_downtime;

        return $this;
    }

    public function setOpenJob($timeout): OpenJob
    {
        if (isset($timeout) !== true) {
            return $this;
        }
        $this->timeout = $timeout;

        return $this;
    }

}
