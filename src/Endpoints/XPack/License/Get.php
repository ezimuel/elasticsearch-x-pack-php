<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\License;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 * Elasticsearch API name xpack.license.get
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\License
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    public function getURI(): string
    {

        return "/_xpack/license";
    }

    public function getParamWhitelist(): array
    {
        return [
            'local'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
    
}
