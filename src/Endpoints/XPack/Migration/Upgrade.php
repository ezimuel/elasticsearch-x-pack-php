<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Migration;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Upgrade
 * Elasticsearch API name xpack.migration.upgrade
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Migration
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Upgrade extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for upgrade'
            );
        }
        $index = $this->index;

        return "/_xpack/migration/upgrade/$index";
    }

    public function getParamWhitelist(): array
    {
        return [
            'wait_for_completion'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
}
