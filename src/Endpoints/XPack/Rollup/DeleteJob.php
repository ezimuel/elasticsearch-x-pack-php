<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Rollup;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class DeleteJob
 * Elasticsearch API name xpack.rollup.delete_job
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Rollup
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class DeleteJob extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for delete_job'
            );
        }
        $id = $this->id;

        return "/_xpack/rollup/job/$id";
    }

    public function getParamWhitelist(): array
    {
        return [];
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }
    
    public function setDeleteJob($id): DeleteJob
    {
        if (isset($id) !== true) {
            return $this;
        }
        $this->id = $id;

        return $this;
    }

}
