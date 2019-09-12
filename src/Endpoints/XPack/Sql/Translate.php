<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Sql;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Translate
 * Elasticsearch API name xpack.sql.translate
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Sql
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Translate extends AbstractEndpoint
{
    public function getURI(): string
    {

        return "/_xpack/sql/translate";
    }

    public function getParamWhitelist(): array
    {
        return [
            
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
    
    public function setBody($body): Translate
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

}
