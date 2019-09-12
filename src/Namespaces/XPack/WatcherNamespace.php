<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces\XPack;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class WatcherNamespace
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\XPack
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class WatcherNamespace extends AbstractNamespace
{
        /**
     * Endpoint: xpack.watcher.ack_watch
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-ack-watch.html
     *
     * $params[
     *   'watch_id'       => '(string) Watch ID (Required)',
     *   'action_id'      => '(list) A comma-separated list of the action ids to be acked',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     * ]
     */
    public function ackWatch(array $params = [])
    {
        $watch_id = $this->extractArgument($params, 'watch_id');
        $action_id = $this->extractArgument($params, 'action_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Watcher\AckWatch;
        $endpoint->setParams($params);
        $endpoint->setWatchId($watch_id);
        $endpoint->setActionId($action_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.watcher.activate_watch
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-activate-watch.html
     *
     * $params[
     *   'watch_id'       => '(string) Watch ID (Required)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     * ]
     */
    public function activateWatch(array $params = [])
    {
        $watch_id = $this->extractArgument($params, 'watch_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Watcher\ActivateWatch;
        $endpoint->setParams($params);
        $endpoint->setWatchId($watch_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.watcher.deactivate_watch
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-deactivate-watch.html
     *
     * $params[
     *   'watch_id'       => '(string) Watch ID (Required)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     * ]
     */
    public function deactivateWatch(array $params = [])
    {
        $watch_id = $this->extractArgument($params, 'watch_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Watcher\DeactivateWatch;
        $endpoint->setParams($params);
        $endpoint->setWatchId($watch_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.watcher.delete_watch
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-delete-watch.html
     *
     * $params[
     *   'id'             => '(string) Watch ID (Required)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     * ]
     */
    public function deleteWatch(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Watcher\DeleteWatch;
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.watcher.execute_watch
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-execute-watch.html
     *
     * $params[
     *   'body'  => '(string) Execution control',
     *   'id'    => '(string) Watch ID',
     *   'debug' => '(boolean) indicates whether the watch should execute in debug mode',
     * ]
     */
    public function executeWatch(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Watcher\ExecuteWatch;
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.watcher.get_watch
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-get-watch.html
     *
     * $params[
     *   'id' => '(string) Watch ID (Required)',
     * ]
     */
    public function getWatch(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Watcher\GetWatch;
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.watcher.put_watch
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-put-watch.html
     *
     * $params[
     *   'body'           => '(string) The watch (Required)',
     *   'id'             => '(string) Watch ID (Required)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'active'         => '(boolean) Specify whether the watch is in/active by default',
     *   'version'        => '(number) Explicit version number for concurrency control',
     * ]
     */
    public function putWatch(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Watcher\PutWatch;
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.watcher.restart
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-restart.html
     *
     */
    public function restart(array $params = [])
    {

        $endpoint = new \Elasticsearch\Endpoints\XPack\Watcher\Restart;
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.watcher.start
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-start.html
     *
     */
    public function start(array $params = [])
    {

        $endpoint = new \Elasticsearch\Endpoints\XPack\Watcher\Start;
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.watcher.stats
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-stats.html
     *
     * $params[
     *   'metric'           => '(enum) Controls what additional stat metrics should be include in the response',
     *   'metric'           => '(enum) Controls what additional stat metrics should be include in the response (Options = _all,queued_watches,pending_watches)',
     *   'emit_stacktraces' => '(boolean) Emits stack traces of currently running watches',
     * ]
     */
    public function stats(array $params = [])
    {
        $metric = $this->extractArgument($params, 'metric');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Watcher\Stats;
        $endpoint->setParams($params);
        $endpoint->setMetric($metric);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.watcher.stop
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-stop.html
     *
     */
    public function stop(array $params = [])
    {

        $endpoint = new \Elasticsearch\Endpoints\XPack\Watcher\Stop;
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

}
