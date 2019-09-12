<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Migration;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetAssistance
 * Elasticsearch API name xpack.migration.get_assistance
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Migration
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetAssistance extends AbstractEndpoint
{
    public function getURI(): string
    {
        $index = $this->index ?? null;

        if (isset($index)) {
            return "/_xpack/migration/assistance/$index";
        }
        return "/_xpack/migration/assistance";
    }

    public function getParamWhitelist(): array
    {
        return [
            'allow_no_indices',
            'expand_wildcards',
            'ignore_unavailable'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
    
}
