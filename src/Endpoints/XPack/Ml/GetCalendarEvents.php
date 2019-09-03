<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetCalendarEvents
 * Elasticsearch API name xpack.ml.get_calendar_events
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetCalendarEvents extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->calendar_id) !== true) {
            throw new Exceptions\RuntimeException(
                'calendar_id is required for get_calendar_events'
            );
        }
        $calendar_id = $this->calendar_id;

        return "/_xpack/ml/calendars/$calendar_id/events";
    }

    public function getParamWhitelist(): array
    {
        return [
            'job_id',
            'start',
            'end',
            'from',
            'size'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
    
    public function setGetCalendarEvents($calendar_id): GetCalendarEvents
    {
        if (isset($calendar_id) !== true) {
            return $this;
        }
        $this->calendar_id = $calendar_id;

        return $this;
    }

}