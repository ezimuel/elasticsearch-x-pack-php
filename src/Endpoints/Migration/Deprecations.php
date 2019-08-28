<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Endpoints\Migration;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Deprecations
 * Generated by util/GenerateEndpoints.php
 *
 * @category Elasticsearch
 * @package  Elasticsearch\XPack\Endpoints\Migration
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
