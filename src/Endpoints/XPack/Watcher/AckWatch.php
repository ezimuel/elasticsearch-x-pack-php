<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Watcher;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class AckWatch
 * Elasticsearch API name xpack.watcher.ack_watch
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Watcher
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class AckWatch extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->watch_id) !== true) {
            throw new Exceptions\RuntimeException(
                'watch_id is required for ack_watch'
            );
        }
        $watch_id = $this->watch_id;
        $action_id = $this->action_id ?? null;

        if (isset($action_id)) {
            return "/_xpack/watcher/watch/$watch_id/_ack/$action_id";
        }
        return "/_xpack/watcher/watch/$watch_id/_ack";
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
    
    public function setAckWatch($watch_id): AckWatch
    {
        if (isset($watch_id) !== true) {
            return $this;
        }
        $this->watch_id = $watch_id;

        return $this;
    }

    public function setAckWatch($action_id): AckWatch
    {
        if (isset($action_id) !== true) {
            return $this;
        }
        $this->action_id = $action_id;

        return $this;
    }

}
