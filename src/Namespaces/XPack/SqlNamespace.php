<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces\XPack;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class SqlNamespace
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\XPack
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class SqlNamespace extends AbstractNamespace
{
        /**
     * Endpoint: xpack.sql.clear_cursor
     *
     * @see Clear SQL cursor
     *
     * $params[
     *   'body' => '(string) Specify the cursor value in the `cursor` element to clean the cursor. (Required)',
     * ]
     */
    public function clearCursor(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('XPack\Sql\ClearCursor');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.sql.query
     *
     * @see Execute SQL
     *
     * $params[
     *   'body'   => '(string) Use the `query` element to start a query. Use the `cursor` element to continue a query. (Required)',
     *   'format' => '(string) a short version of the Accept header, e.g. json, yaml',
     * ]
     */
    public function query(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('XPack\Sql\Query');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.sql.translate
     *
     * @see Translate SQL into Elasticsearch queries
     *
     * $params[
     *   'body' => '(string) Specify the query in the `query` element. (Required)',
     * ]
     */
    public function translate(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('XPack\Sql\Translate');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }

}
