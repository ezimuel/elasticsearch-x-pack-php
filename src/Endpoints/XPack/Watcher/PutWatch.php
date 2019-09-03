<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Watcher;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class PutWatch
 * Elasticsearch API name xpack.watcher.put_watch
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Watcher
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class PutWatch extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for put_watch'
            );
        }
        $id = $this->id;

        return "/_xpack/watcher/watch/$id";
    }

    public function getParamWhitelist(): array
    {
        return [
            'master_timeout',
            'active',
            'version'
        ];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }
    
    public function setPutWatch($body): PutWatch
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setPutWatch($id): PutWatch
    {
        if (isset($id) !== true) {
            return $this;
        }
        $this->id = $id;

        return $this;
    }

}
