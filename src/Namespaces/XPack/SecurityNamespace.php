<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces\XPack;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class SecurityNamespace
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\XPack
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

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\Authenticate;
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
    public function changePassword(array $params = [])
    {
        $username = $this->extractArgument($params, 'username');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\ChangePassword;
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
    public function clearCachedRealms(array $params = [])
    {
        $realms = $this->extractArgument($params, 'realms');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\ClearCachedRealms;
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
    public function clearCachedRoles(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\ClearCachedRoles;
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
    public function deleteRole(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\DeleteRole;
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
    public function deleteRoleMapping(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\DeleteRoleMapping;
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
    public function deleteUser(array $params = [])
    {
        $username = $this->extractArgument($params, 'username');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\DeleteUser;
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
    public function disableUser(array $params = [])
    {
        $username = $this->extractArgument($params, 'username');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\DisableUser;
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
    public function enableUser(array $params = [])
    {
        $username = $this->extractArgument($params, 'username');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\EnableUser;
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
    public function getRole(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\GetRole;
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
    public function getRoleMapping(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\GetRoleMapping;
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
    public function getToken(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\GetToken;
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
    public function getUser(array $params = [])
    {
        $username = $this->extractArgument($params, 'username');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\GetUser;
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
    public function invalidateToken(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\InvalidateToken;
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
    public function putRole(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\PutRole;
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
    public function putRoleMapping(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\PutRoleMapping;
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
    public function putUser(array $params = [])
    {
        $username = $this->extractArgument($params, 'username');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Security\PutUser;
        $endpoint->setParams($params);
        $endpoint->setUsername($username);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }

}
