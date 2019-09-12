<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Info
 * Elasticsearch API name xpack.ml.info
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Info extends AbstractEndpoint
{
    public function getURI(): string
    {

        return "/_xpack/ml/info";
    }

    public function getParamWhitelist(): array
    {
        return [];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
    
}
