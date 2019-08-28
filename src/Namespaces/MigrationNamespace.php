<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class MigrationNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\XPack\Namespaces
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class MigrationNamespace extends AbstractNamespace
{
    /**
     * Endpoint: xpack.migration.deprecations
     *
     * @see http://www.elastic.co/guide/en/migration/current/migration-api-deprecation.html
     *
     * $params[
     *   'index' => '(string) Index pattern',
     * ]
     */
    public function deprecations(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('deprecationsclass');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.migration.get_assistance
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/migration-api-assistance.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     * ]
     */
    public function get_assistance(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('get_assistanceclass');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
/**
     * Endpoint: xpack.migration.upgrade
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/migration-api-upgrade.html
     *
     * $params[
     *   'index'               => '(string) The name of the index (Required)',
     *   'wait_for_completion' => '(boolean) Should the request block until the upgrade operation is completed (Default = true)',
     * ]
     */
    public function upgrade(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('upgradeclass');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }

}
