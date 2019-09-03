<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Security;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class DeleteRoleMapping
 * Elasticsearch API name xpack.security.delete_role_mapping
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Security
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class DeleteRoleMapping extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->name) !== true) {
            throw new Exceptions\RuntimeException(
                'name is required for delete_role_mapping'
            );
        }
        $name = $this->name;

        return "/_xpack/security/role_mapping/$name";
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
    
    public function setDeleteRoleMapping($name): DeleteRoleMapping
    {
        if (isset($name) !== true) {
            return $this;
        }
        $this->name = $name;

        return $this;
    }

}