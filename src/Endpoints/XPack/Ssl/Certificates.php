<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ssl;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Certificates
 * Elasticsearch API name xpack.ssl.certificates
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ssl
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Certificates extends AbstractEndpoint
{
    public function getURI(): string
    {

        return "/_xpack/ssl/certificates";
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
