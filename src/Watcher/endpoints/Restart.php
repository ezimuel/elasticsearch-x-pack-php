<?php


namespace XPack\Watcher\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Restart
 *
 * @category Watcher
 * @package  XPack\Watcher\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class Restart extends AbstractEndpoint
{

    /**
     * @return string
     */
    public function getURI()
    {
        return "/_xpack/watcher/_restart";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [];
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return "PUT";
    }
}