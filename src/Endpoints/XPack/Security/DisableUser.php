<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Security;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class DisableUser
 * Elasticsearch API name xpack.security.disable_user
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Security
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class DisableUser extends AbstractEndpoint
{
    public function getURI(): string
    {
        $username = $this->username ?? null;

        if (isset($username)) {
            return "/_xpack/security/user/$username/_disable";
        }
    }

    public function getParamWhitelist(): array
    {
        return [
            'refresh'
        ];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }
    
    public function setUsername($username): DisableUser
    {
        if (isset($username) !== true) {
            return $this;
        }
        $this->username = $username;

        return $this;
    }

}
