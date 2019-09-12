<?php
declare(strict_types = 1);

namespace Elasticsearch\XPack\Util;

use Exception;

class NamespaceEndpoint
{
    const NAMESPACE_CLASS_TEMPLATE = __DIR__ . '/skeleton/namespace-class';
    const ENDPOINT_FUNCTION_TEMPLATE = __DIR__ . '/skeleton/endpoint-function';
    const ENDPOINT_FUNCTION_BOOL_TEMPLATE = __DIR__ . '/skeleton/endpoint-function-bool';
    const EXTRACT_ARG_TEMPLATE = __DIR__ . '/skeleton/extract-arg';
    const SET_PARAM_TEMPLATE = __DIR__ . '/skeleton/setparam';

    protected $name;
    protected $endpoints = [];
    protected $endpointNames = [];
    protected $version; /* Elasticsearch version used to generate the class */

    public function __construct(string $name, string $version)
    {
        $this->name = $name;
        $this->version = $version;
    }

    public function renderClass(): string
    {
        if (empty($this->endpoints)) {
            throw new Exception("No endpoints has been added. I cannot render the class");
        }
        $class = file_get_contents(__DIR__ . '/skeleton/namespace-class');
        $class = str_replace(':namespace', ucfirst($this->name) . 'Namespace', $class);

        $endpoints = '';
        foreach($this->endpoints as $endpoint) {
            $endpoints .= $this->renderEndpoint($endpoint);
        }
        $class = str_replace(':endpoints', $endpoints, $class);

        return str_replace(':version', $this->version, $class);
    }

    public function addEndpoint(Endpoint $endpoint): NamespaceEndpoint
    {
        if (in_array($endpoint->name, $this->endpointNames)) {
            throw new Exception(sprintf(
                "The endpoint %s has been already added",
                $endpoint->namespace
            ));
        }
        $this->endpoints[] = $endpoint;
        $this->endpointNames[] = $endpoint->name;

        return $this;
    }

    private function renderEndpoint(Endpoint $endpoint): string
    {
        $code = file_get_contents(
            $endpoint->getMethod() === ['HEAD']
            ? self::ENDPOINT_FUNCTION_BOOL_TEMPLATE
            : self::ENDPOINT_FUNCTION_TEMPLATE
        );

        $code = str_replace(':apidoc', $endpoint->renderDocParams(), $code);
        $lowerCamelCase = preg_replace_callback(
            '/_(.?)/',
            function($matches){
                return strtoupper($matches[1]);
            },
            $endpoint->name
        );
        $code = str_replace(':endpoint', $lowerCamelCase, $code);
        $extract = '';
        $setParams = '';
        foreach ($endpoint->getParts() as $part) {
            $extract .= str_replace(':part', $part, file_get_contents(self::EXTRACT_ARG_TEMPLATE));

            $param = str_replace(':param', $part, file_get_contents(self::SET_PARAM_TEMPLATE));

            $setParams .= str_replace(':Param', $this->normalizeName($part), $param);
        }
        if (!$endpoint->isBodyNull()) {
            $extract .= str_replace(':part', 'body', file_get_contents(self::EXTRACT_ARG_TEMPLATE));

            $param = str_replace(':param', 'body', file_get_contents(self::SET_PARAM_TEMPLATE));
            $setParams .= str_replace(':Param', 'Body', $param);
        }
        $code = str_replace(':extract', $extract, $code);
        $code = str_replace(':setparam', $setParams, $code);

        if (empty($endpoint->namespace)) {
            $endpointClass = $endpoint->getClassName();
        } else {
            $endpointClass = ucfirst($endpoint->namespace) . '\\' . $endpoint->getClassName();
        }
        return str_replace(':EndpointClass', $endpointClass, $code);
    }

    protected function normalizeName(string $name): string
    {
        return str_replace('_', '', ucwords($name, '_'));
    }
}
