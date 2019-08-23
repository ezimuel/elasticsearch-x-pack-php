<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Ssl;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Certificates
 * Generated by util/GenerateEndpoints.php
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Ssl
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
