<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Endpoints\Migration;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetAssistance
 * Generated by util/GenerateEndpoints.php
 *
 * @category Elasticsearch
 * @package  Elasticsearch\XPack\Endpoints\Migration
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
