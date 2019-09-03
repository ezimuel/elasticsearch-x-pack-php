<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetModelSnapshots
 * Elasticsearch API name xpack.ml.get_model_snapshots
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetModelSnapshots extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->job_id) !== true) {
            throw new Exceptions\RuntimeException(
                'job_id is required for get_model_snapshots'
            );
        }
        $job_id = $this->job_id;
        $snapshot_id = $this->snapshot_id ?? null;

        if (isset($snapshot_id)) {
            return "/_xpack/ml/anomaly_detectors/$job_id/model_snapshots/$snapshot_id";
        }
        return "/_xpack/ml/anomaly_detectors/$job_id/model_snapshots";
    }

    public function getParamWhitelist(): array
    {
        return [
            'from',
            'size',
            'start',
            'end',
            'sort',
            'desc'
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
    
    public function setGetModelSnapshots($body): GetModelSnapshots
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setGetModelSnapshots($job_id): GetModelSnapshots
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;

        return $this;
    }

    public function setGetModelSnapshots($snapshot_id): GetModelSnapshots
    {
        if (isset($snapshot_id) !== true) {
            return $this;
        }
        $this->snapshot_id = $snapshot_id;

        return $this;
    }

}
