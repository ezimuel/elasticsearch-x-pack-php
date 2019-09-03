<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\License;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class PostStartBasic
 * Elasticsearch API name xpack.license.post_start_basic
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\License
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class PostStartBasic extends AbstractEndpoint
{
    public function getURI(): string
    {

        return "/_xpack/license/start_basic";
    }

    public function getParamWhitelist(): array
    {
        return [
            'acknowledge'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
}
