<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Security;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class DeleteUser
 * Elasticsearch API name xpack.security.delete_user
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Security
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class DeleteUser extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->username) !== true) {
            throw new Exceptions\RuntimeException(
                'username is required for delete_user'
            );
        }
        $username = $this->username;

        return "/_xpack/security/user/$username";
    }

    public function getParamWhitelist(): array
    {
        return [
            'refresh'
        ];
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }
    
    public function setDeleteUser($username): DeleteUser
    {
        if (isset($username) !== true) {
            return $this;
        }
        $this->username = $username;

        return $this;
    }

}
