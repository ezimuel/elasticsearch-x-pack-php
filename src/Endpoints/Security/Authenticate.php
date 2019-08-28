<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Endpoints\Security;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Authenticate
 * Generated by util/GenerateEndpoints.php
 *
 * @category Elasticsearch
 * @package  Elasticsearch\XPack\Endpoints\Security
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
