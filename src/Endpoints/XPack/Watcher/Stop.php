<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Watcher;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Stop
 * Elasticsearch API name xpack.watcher.stop
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Watcher
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Stop extends AbstractEndpoint
{
    public function getURI(): string
    {

        return "/_xpack/watcher/_stop";
    }

    public function getParamWhitelist(): array
    {
        return [
            
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
}
