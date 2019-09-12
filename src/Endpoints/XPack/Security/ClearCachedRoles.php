<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Security;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class ClearCachedRoles
 * Elasticsearch API name xpack.security.clear_cached_roles
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Security
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ClearCachedRoles extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->name) !== true) {
            throw new Exceptions\RuntimeException(
                'name is required for clear_cached_roles'
            );
        }
        $name = $this->name;

        return "/_xpack/security/role/$name/_clear_cache";
    }

    public function getParamWhitelist(): array
    {
        return [
            
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
    public function setName($name): ClearCachedRoles
    {
        if (isset($name) !== true) {
            return $this;
        }
        $this->name = $name;

        return $this;
    }

}
