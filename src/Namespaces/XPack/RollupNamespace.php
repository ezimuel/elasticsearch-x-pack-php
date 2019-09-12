<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces\XPack;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class RollupNamespace
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\XPack
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
    public function deleteJob(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Rollup\DeleteJob;
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
    public function getJobs(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Rollup\GetJobs;
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
    public function getRollupCaps(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Rollup\GetRollupCaps;
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
    public function putJob(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Rollup\PutJob;
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
    public function rollupSearch(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Rollup\RollupSearch;
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
    public function startJob(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Rollup\StartJob;
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
    public function stopJob(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Rollup\StopJob;
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }

}
