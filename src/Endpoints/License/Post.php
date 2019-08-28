<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Endpoints\License;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Post
 * Generated by util/GenerateEndpoints.php
 *
 * @category Elasticsearch
 * @package  Elasticsearch\XPack\Endpoints\License
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Post extends AbstractEndpoint
{
    public function getURI(): string
    {

        return "/_xpack/license";
    }

    public function getParamWhitelist(): array
    {
        return [
            'acknowledge'
        ];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }
    
    public function setPost($body): Post
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

}
