<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Watcher;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetWatch
 * Elasticsearch API name xpack.watcher.get_watch
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Watcher
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetWatch extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for get_watch'
            );
        }
        $id = $this->id;

        return "/_xpack/watcher/watch/$id";
    }

    public function getParamWhitelist(): array
    {
        return [
            
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
    
    public function setGetWatch($id): GetWatch
    {
        if (isset($id) !== true) {
            return $this;
        }
        $this->id = $id;

        return $this;
    }

}
