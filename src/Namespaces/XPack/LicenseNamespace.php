<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces\XPack;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class LicenseNamespace
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\XPack
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class LicenseNamespace extends AbstractNamespace
{
    /**
     * Endpoint: xpack.license.delete
     *
     * @see https://www.elastic.co/guide/en/x-pack/current/license-management.html
     *
     */
    public function delete(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('XPack\License\Delete');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.license.get
     *
     * @see https://www.elastic.co/guide/en/x-pack/current/license-management.html
     *
     * $params[
     *   'local' => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     * ]
     */
    public function get(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('XPack\License\Get');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.license.get_basic_status
     *
     * @see https://www.elastic.co/guide/en/x-pack/current/license-management.html
     *
     */
    public function getBasicStatus(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('XPack\License\GetBasicStatus');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.license.get_trial_status
     *
     * @see https://www.elastic.co/guide/en/x-pack/current/license-management.html
     *
     */
    public function getTrialStatus(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('XPack\License\GetTrialStatus');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.license.post
     *
     * @see https://www.elastic.co/guide/en/x-pack/current/license-management.html
     *
     * $params[
     *   'body'        => '(string) licenses to be installed',
     *   'acknowledge' => '(boolean) whether the user has acknowledged acknowledge messages (default: false)',
     * ]
     */
    public function post(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('XPack\License\Post');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.license.post_start_basic
     *
     * @see https://www.elastic.co/guide/en/x-pack/current/license-management.html
     *
     * $params[
     *   'acknowledge' => '(boolean) whether the user has acknowledged acknowledge messages (default: false)',
     * ]
     */
    public function postStartBasic(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('XPack\License\PostStartBasic');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.license.post_start_trial
     *
     * @see https://www.elastic.co/guide/en/x-pack/current/license-management.html
     *
     * $params[
     *   'type'        => '(string) The type of trial license to generate (default: "trial")',
     *   'acknowledge' => '(boolean) whether the user has acknowledged acknowledge messages (default: false)',
     * ]
     */
    public function postStartTrial(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('XPack\License\PostStartTrial');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

}
