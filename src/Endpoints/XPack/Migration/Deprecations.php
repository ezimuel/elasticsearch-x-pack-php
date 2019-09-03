<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Migration;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Deprecations
 * Elasticsearch API name xpack.migration.deprecations
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Migration
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Deprecations extends AbstractEndpoint
{
    public function getURI(): string
    {
        $index = $this->index ?? null;

        if (isset($index)) {
            return "/$index/_xpack/migration/deprecations";
        }
        return "/_xpack/migration/deprecations";
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
