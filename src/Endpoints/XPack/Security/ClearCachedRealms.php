<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Security;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class ClearCachedRealms
 * Elasticsearch API name xpack.security.clear_cached_realms
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Security
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ClearCachedRealms extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->realms) !== true) {
            throw new Exceptions\RuntimeException(
                'realms is required for clear_cached_realms'
            );
        }
        $realms = $this->realms;

        return "/_xpack/security/realm/$realms/_clear_cache";
    }

    public function getParamWhitelist(): array
    {
        return [
            'usernames'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
    public function setClearCachedRealms($realms): ClearCachedRealms
    {
        if (isset($realms) !== true) {
            return $this;
        }
        $this->realms = $realms;

        return $this;
    }

}
