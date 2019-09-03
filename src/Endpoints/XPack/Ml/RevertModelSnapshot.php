<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class RevertModelSnapshot
 * Elasticsearch API name xpack.ml.revert_model_snapshot
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class RevertModelSnapshot extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->job_id) !== true) {
            throw new Exceptions\RuntimeException(
                'job_id is required for revert_model_snapshot'
            );
        }
        $job_id = $this->job_id;
        if (isset($this->snapshot_id) !== true) {
            throw new Exceptions\RuntimeException(
                'snapshot_id is required for revert_model_snapshot'
            );
        }
        $snapshot_id = $this->snapshot_id;

        return "/_xpack/ml/anomaly_detectors/$job_id/model_snapshots/$snapshot_id/_revert";
    }

    public function getParamWhitelist(): array
    {
        return [
            'delete_intervening_results'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
    public function setRevertModelSnapshot($body): RevertModelSnapshot
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setRevertModelSnapshot($job_id): RevertModelSnapshot
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;

        return $this;
    }

    public function setRevertModelSnapshot($snapshot_id): RevertModelSnapshot
    {
        if (isset($snapshot_id) !== true) {
            return $this;
        }
        $this->snapshot_id = $snapshot_id;

        return $this;
    }

}
