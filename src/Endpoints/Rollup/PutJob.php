<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Endpoints\Rollup;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class PutJob
 * Generated by util/GenerateEndpoints.php
 *
 * @category Elasticsearch
 * @package  Elasticsearch\XPack\Endpoints\Rollup
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class PutJob extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for put_job'
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
        return 'PUT';
    }
    
    public function setPutJob($body): PutJob
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setPutJob($id): PutJob
    {
        if (isset($id) !== true) {
            return $this;
        }
        $this->id = $id;

        return $this;
    }

}
