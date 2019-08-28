<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class RollupNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\XPack\Namespaces
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class RollupNamespace extends AbstractNamespace
{
    /**
     * Endpoint: xpack.rollup.delete_job
     *
     * @see 
     *
     * $params[
     *   'id' => '(string) The ID of the job to delete (Required)',
     * ]
     */
    public function delete_job(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('delete_jobclass');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.rollup.get_jobs
     *
     * @see 
     *
     * $params[
     *   'id' => '(string) The ID of the job(s) to fetch. Accepts glob patterns, or left blank for all jobs',
     * ]
     */
    public function get_jobs(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('get_jobsclass');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.rollup.get_rollup_caps
     *
     * @see 
     *
     * $params[
     *   'id' => '(string) The ID of the index to check rollup capabilities on, or left blank for all jobs',
     * ]
     */
    public function get_rollup_caps(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('get_rollup_capsclass');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.rollup.put_job
     *
     * @see 
     *
     * $params[
     *   'body' => '(string) The job configuration (Required)',
     *   'id'   => '(string) The ID of the job to create (Required)',
     * ]
     */
    public function put_job(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('put_jobclass');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.rollup.rollup_search
     *
     * @see 
     *
     * $params[
     *   'body'  => '(string) The search request body (Required)',
     *   'index' => '(string) The index or index-pattern (containing rollup or regular data) that should be searched (Required)',
     *   'type'  => '(string) The doc type inside the index',
     * ]
     */
    public function rollup_search(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('rollup_searchclass');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.rollup.start_job
     *
     * @see 
     *
     * $params[
     *   'id' => '(string) The ID of the job to start (Required)',
     * ]
     */
    public function start_job(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('start_jobclass');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.rollup.stop_job
     *
     * @see 
     *
     * $params[
     *   'id' => '(string) The ID of the job to stop (Required)',
     * ]
     */
    public function stop_job(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('stop_jobclass');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }

}
