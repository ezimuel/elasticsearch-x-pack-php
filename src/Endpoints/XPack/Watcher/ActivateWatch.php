<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Watcher;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class ActivateWatch
 * Elasticsearch API name xpack.watcher.activate_watch
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Watcher
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ActivateWatch extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->watch_id) !== true) {
            throw new Exceptions\RuntimeException(
                'watch_id is required for activate_watch'
            );
        }
        $watch_id = $this->watch_id;

        return "/_xpack/watcher/watch/$watch_id/_activate";
    }

    public function getParamWhitelist(): array
    {
        return [
            'master_timeout'
        ];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }
    
    public function setWatchId($watch_id): ActivateWatch
    {
        if (isset($watch_id) !== true) {
            return $this;
        }
        $this->watch_id = $watch_id;

        return $this;
    }

}
