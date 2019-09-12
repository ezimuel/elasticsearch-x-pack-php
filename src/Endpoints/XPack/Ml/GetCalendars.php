<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetCalendars
 * Elasticsearch API name xpack.ml.get_calendars
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetCalendars extends AbstractEndpoint
{
    public function getURI(): string
    {
        $calendar_id = $this->calendar_id ?? null;

        if (isset($calendar_id)) {
            return "/_xpack/ml/calendars/$calendar_id";
        }
        return "/_xpack/ml/calendars";
    }

    public function getParamWhitelist(): array
    {
        return [
            'from',
            'size'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
    
    public function setCalendarId($calendar_id): GetCalendars
    {
        if (isset($calendar_id) !== true) {
            return $this;
        }
        $this->calendar_id = $calendar_id;

        return $this;
    }

}
