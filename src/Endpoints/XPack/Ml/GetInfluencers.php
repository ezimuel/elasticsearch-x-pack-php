<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetInfluencers
 * Elasticsearch API name xpack.ml.get_influencers
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetInfluencers extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->job_id) !== true) {
            throw new Exceptions\RuntimeException(
                'job_id is required for get_influencers'
            );
        }
        $job_id = $this->job_id;

        return "/_xpack/ml/anomaly_detectors/$job_id/results/influencers";
    }

    public function getParamWhitelist(): array
    {
        return [
            'exclude_interim',
            'from',
            'size',
            'start',
            'end',
            'influencer_score',
            'sort',
            'desc'
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
    
    public function setGetInfluencers($body): GetInfluencers
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setGetInfluencers($job_id): GetInfluencers
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;

        return $this;
    }

}