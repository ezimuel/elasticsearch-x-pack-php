<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class SecurityNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\XPack\Namespaces
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class SecurityNamespace extends AbstractNamespace
{
    /**
     * Endpoint: xpack.security.authenticate
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-authenticate.html
     *
     */
    public function authenticate(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('authenticateclass');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.change_password
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-change-password.html
     *
     * $params[
     *   'body'     => '(string) the new password for the user (Required)',
     *   'username' => '(string) The username of the user to change the password for',
     *   'refresh'  => '(enum) If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes. (Options = true,false,wait_for)',
     * ]
     */
    public function change_password(array $params = [])
    {
        $username = $this->extractArgument($params, 'username');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('change_passwordclass');
        $endpoint->setParams($params);
        $endpoint->setUsername($username);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.clear_cached_realms
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-clear-cache.html
     *
     * $params[
     *   'realms'    => '(list) Comma-separated list of realms to clear (Required)',
     *   'usernames' => '(list) Comma-separated list of usernames to clear from the cache',
     * ]
     */
    public function clear_cached_realms(array $params = [])
    {
        $realms = $this->extractArgument($params, 'realms');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('clear_cached_realmsclass');
        $endpoint->setParams($params);
        $endpoint->setRealms($realms);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.clear_cached_roles
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-roles.html#security-api-clear-role-cache
     *
     * $params[
     *   'name' => '(list) Role name (Required)',
     * ]
     */
    public function clear_cached_roles(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('clear_cached_rolesclass');
        $endpoint->setParams($params);
        $endpoint->setName($name);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.delete_role
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-roles.html#security-api-delete-role
     *
     * $params[
     *   'name'    => '(string) Role name (Required)',
     *   'refresh' => '(enum) If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes. (Options = true,false,wait_for)',
     * ]
     */
    public function delete_role(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('delete_roleclass');
        $endpoint->setParams($params);
        $endpoint->setName($name);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.delete_role_mapping
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-role-mapping.html#security-api-delete-role-mapping
     *
     * $params[
     *   'name'    => '(string) Role-mapping name (Required)',
     *   'refresh' => '(enum) If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes. (Options = true,false,wait_for)',
     * ]
     */
    public function delete_role_mapping(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('delete_role_mappingclass');
        $endpoint->setParams($params);
        $endpoint->setName($name);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.delete_user
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-users.html#security-api-delete-user
     *
     * $params[
     *   'username' => '(string) username (Required)',
     *   'refresh'  => '(enum) If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes. (Options = true,false,wait_for)',
     * ]
     */
    public function delete_user(array $params = [])
    {
        $username = $this->extractArgument($params, 'username');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('delete_userclass');
        $endpoint->setParams($params);
        $endpoint->setUsername($username);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.disable_user
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-users.html#security-api-disable-user
     *
     * $params[
     *   'username' => '(string) The username of the user to disable',
     *   'refresh'  => '(enum) If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes. (Options = true,false,wait_for)',
     * ]
     */
    public function disable_user(array $params = [])
    {
        $username = $this->extractArgument($params, 'username');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('disable_userclass');
        $endpoint->setParams($params);
        $endpoint->setUsername($username);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.enable_user
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-users.html#security-api-enable-user
     *
     * $params[
     *   'username' => '(string) The username of the user to enable',
     *   'refresh'  => '(enum) If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes. (Options = true,false,wait_for)',
     * ]
     */
    public function enable_user(array $params = [])
    {
        $username = $this->extractArgument($params, 'username');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('enable_userclass');
        $endpoint->setParams($params);
        $endpoint->setUsername($username);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.get_role
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-roles.html#security-api-get-role
     *
     * $params[
     *   'name' => '(string) Role name',
     * ]
     */
    public function get_role(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('get_roleclass');
        $endpoint->setParams($params);
        $endpoint->setName($name);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.get_role_mapping
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-role-mapping.html#security-api-get-role-mapping
     *
     * $params[
     *   'name' => '(string) Role-Mapping name',
     * ]
     */
    public function get_role_mapping(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('get_role_mappingclass');
        $endpoint->setParams($params);
        $endpoint->setName($name);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.get_token
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-tokens.html#security-api-get-token
     *
     * $params[
     *   'body' => '(string) The token request to get (Required)',
     * ]
     */
    public function get_token(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('get_tokenclass');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.get_user
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-users.html#security-api-get-user
     *
     * $params[
     *   'username' => '(list) A comma-separated list of usernames',
     * ]
     */
    public function get_user(array $params = [])
    {
        $username = $this->extractArgument($params, 'username');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('get_userclass');
        $endpoint->setParams($params);
        $endpoint->setUsername($username);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.invalidate_token
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-tokens.html#security-api-invalidate-token
     *
     * $params[
     *   'body' => '(string) The token to invalidate (Required)',
     * ]
     */
    public function invalidate_token(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('invalidate_tokenclass');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.put_role
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-roles.html#security-api-put-role
     *
     * $params[
     *   'body'    => '(string) The role to add (Required)',
     *   'name'    => '(string) Role name (Required)',
     *   'refresh' => '(enum) If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes. (Options = true,false,wait_for)',
     * ]
     */
    public function put_role(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('put_roleclass');
        $endpoint->setParams($params);
        $endpoint->setName($name);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.put_role_mapping
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-role-mapping.html#security-api-put-role-mapping
     *
     * $params[
     *   'body'    => '(string) The role to add (Required)',
     *   'name'    => '(string) Role-mapping name (Required)',
     *   'refresh' => '(enum) If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes. (Options = true,false,wait_for)',
     * ]
     */
    public function put_role_mapping(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('put_role_mappingclass');
        $endpoint->setParams($params);
        $endpoint->setName($name);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.security.put_user
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-users.html#security-api-put-user
     *
     * $params[
     *   'body'     => '(string) The user to add (Required)',
     *   'username' => '(string) The username of the User (Required)',
     *   'refresh'  => '(enum) If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes. (Options = true,false,wait_for)',
     * ]
     */
    public function put_user(array $params = [])
    {
        $username = $this->extractArgument($params, 'username');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('put_userclass');
        $endpoint->setParams($params);
        $endpoint->setUsername($username);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }

}
