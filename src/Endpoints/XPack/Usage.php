<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Usage
 * Elasticsearch API name xpack.usage
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Usage extends AbstractEndpoint
{
    public function getURI(): string
    {

        return "/_xpack/usage";
    }

    public function getParamWhitelist(): array
    {
        return [
            'master_timeout'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
    
}