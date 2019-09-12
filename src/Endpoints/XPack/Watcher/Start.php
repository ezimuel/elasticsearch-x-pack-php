<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Watcher;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Start
 * Elasticsearch API name xpack.watcher.start
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Watcher
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Start extends AbstractEndpoint
{
    public function getURI(): string
    {

        return "/_xpack/watcher/_start";
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
