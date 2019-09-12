<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\License;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class PostStartTrial
 * Elasticsearch API name xpack.license.post_start_trial
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\License
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class PostStartTrial extends AbstractEndpoint
{
    public function getURI(): string
    {

        return "/_xpack/license/start_trial";
    }

    public function getParamWhitelist(): array
    {
        return [
            'type',
            'acknowledge'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
}
