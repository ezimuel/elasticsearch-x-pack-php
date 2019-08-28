<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Endpoints\Rollup;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetJobs
 * Generated by util/GenerateEndpoints.php
 *
 * @category Elasticsearch
 * @package  Elasticsearch\XPack\Endpoints\Rollup
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetJobs extends AbstractEndpoint
{
    public function getURI(): string
    {
        $id = $this->id ?? null;

        if (isset($id)) {
            return "/_xpack/rollup/job/$id";
        }
        return "/_xpack/rollup/job/";
    }

    public function getParamWhitelist(): array
    {
        return [];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
    
    public function setGetJobs($id): GetJobs
    {
        if (isset($id) !== true) {
            return $this;
        }
        $this->id = $id;

        return $this;
    }

}
