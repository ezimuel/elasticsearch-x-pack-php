<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class WatcherNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\XPack\Namespaces
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
    public function ack_watch(array $params = [])
    {
        $watch_id = $this->extractArgument($params, 'watch_id');
        $action_id = $this->extractArgument($params, 'action_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('ack_watchclass');
        $endpoint->setParams($params);
        $endpoint->setWatch_id($watch_id);
        $endpoint->setAction_id($action_id);

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
    public function activate_watch(array $params = [])
    {
        $watch_id = $this->extractArgument($params, 'watch_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('activate_watchclass');
        $endpoint->setParams($params);
        $endpoint->setWatch_id($watch_id);

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
    public function deactivate_watch(array $params = [])
    {
        $watch_id = $this->extractArgument($params, 'watch_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('deactivate_watchclass');
        $endpoint->setParams($params);
        $endpoint->setWatch_id($watch_id);

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
    public function delete_watch(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('delete_watchclass');
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
    public function execute_watch(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('execute_watchclass');
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
    public function get_watch(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('get_watchclass');
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
    public function put_watch(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('put_watchclass');
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

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('restartclass');
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

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('startclass');
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

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('statsclass');
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

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('stopclass');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

}
