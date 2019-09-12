<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Security;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetRoleMapping
 * Elasticsearch API name xpack.security.get_role_mapping
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Security
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetRoleMapping extends AbstractEndpoint
{
    public function getURI(): string
    {
        $name = $this->name ?? null;

        if (isset($name)) {
            return "/_xpack/security/role_mapping/$name";
        }
        return "/_xpack/security/role_mapping";
    }

    public function getParamWhitelist(): array
    {
        return [
            
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
    
    public function setName($name): GetRoleMapping
    {
        if (isset($name) !== true) {
            return $this;
        }
        $this->name = $name;

        return $this;
    }

}
