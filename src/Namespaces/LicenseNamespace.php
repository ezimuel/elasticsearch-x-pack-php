<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class LicenseNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\XPack\Namespaces
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
        $endpoint = $endpointBuilder('deleteclass');
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
        $endpoint = $endpointBuilder('getclass');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.license.get_basic_status
     *
     * @see https://www.elastic.co/guide/en/x-pack/current/license-management.html
     *
     */
    public function get_basic_status(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('get_basic_statusclass');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.license.get_trial_status
     *
     * @see https://www.elastic.co/guide/en/x-pack/current/license-management.html
     *
     */
    public function get_trial_status(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('get_trial_statusclass');
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
        $endpoint = $endpointBuilder('postclass');
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
    public function post_start_basic(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('post_start_basicclass');
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
    public function post_start_trial(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('post_start_trialclass');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

}
