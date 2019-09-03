<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Rollup;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class StopJob
 * Elasticsearch API name xpack.rollup.stop_job
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Rollup
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class StopJob extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for stop_job'
            );
        }
        $id = $this->id;

        return "/_xpack/rollup/job/$id/_stop";
    }

    public function getParamWhitelist(): array
    {
        return [];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
    public function setStopJob($id): StopJob
    {
        if (isset($id) !== true) {
            return $this;
        }
        $this->id = $id;

        return $this;
    }

}
