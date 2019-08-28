<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Endpoints\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetBuckets
 * Generated by util/GenerateEndpoints.php
 *
 * @category Elasticsearch
 * @package  Elasticsearch\XPack\Endpoints\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetBuckets extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->job_id) !== true) {
            throw new Exceptions\RuntimeException(
                'job_id is required for get_buckets'
            );
        }
        $job_id = $this->job_id;
        $timestamp = $this->timestamp ?? null;

        if (isset($timestamp)) {
            return "/_xpack/ml/anomaly_detectors/$job_id/results/buckets/$timestamp";
        }
        return "/_xpack/ml/anomaly_detectors/$job_id/results/buckets";
    }

    public function getParamWhitelist(): array
    {
        return [
            'expand',
            'exclude_interim',
            'from',
            'size',
            'start',
            'end',
            'anomaly_score',
            'sort',
            'desc'
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
    
    public function setGetBuckets($body): GetBuckets
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setGetBuckets($job_id): GetBuckets
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;

        return $this;
    }

    public function setGetBuckets($timestamp): GetBuckets
    {
        if (isset($timestamp) !== true) {
            return $this;
        }
        $this->timestamp = $timestamp;

        return $this;
    }

}
