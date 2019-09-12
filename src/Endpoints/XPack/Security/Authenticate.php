<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Security;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Authenticate
 * Elasticsearch API name xpack.security.authenticate
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Security
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Authenticate extends AbstractEndpoint
{
    public function getURI(): string
    {

        return "/_xpack/security/_authenticate";
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
    
}
