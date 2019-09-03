<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class UpdateModelSnapshot
 * Elasticsearch API name xpack.ml.update_model_snapshot
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class UpdateModelSnapshot extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->job_id) !== true) {
            throw new Exceptions\RuntimeException(
                'job_id is required for update_model_snapshot'
            );
        }
        $job_id = $this->job_id;
        if (isset($this->snapshot_id) !== true) {
            throw new Exceptions\RuntimeException(
                'snapshot_id is required for update_model_snapshot'
            );
        }
        $snapshot_id = $this->snapshot_id;

        return "/_xpack/ml/anomaly_detectors/$job_id/model_snapshots/$snapshot_id/_update";
    }

    public function getParamWhitelist(): array
    {
        return [
            
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
    public function setUpdateModelSnapshot($body): UpdateModelSnapshot
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setUpdateModelSnapshot($job_id): UpdateModelSnapshot
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;

        return $this;
    }

    public function setUpdateModelSnapshot($snapshot_id): UpdateModelSnapshot
    {
        if (isset($snapshot_id) !== true) {
            return $this;
        }
        $this->snapshot_id = $snapshot_id;

        return $this;
    }

}
