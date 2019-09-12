<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetJobs
 * Elasticsearch API name xpack.ml.get_jobs
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetJobs extends AbstractEndpoint
{
    public function getURI(): string
    {
        $job_id = $this->job_id ?? null;

        if (isset($job_id)) {
            return "/_xpack/ml/anomaly_detectors/$job_id";
        }
        return "/_xpack/ml/anomaly_detectors";
    }

    public function getParamWhitelist(): array
    {
        return [
            'allow_no_jobs'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
    
    public function setJobId($job_id): GetJobs
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;

        return $this;
    }

}
