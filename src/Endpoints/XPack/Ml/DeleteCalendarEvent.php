<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class DeleteCalendarEvent
 * Elasticsearch API name xpack.ml.delete_calendar_event
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class DeleteCalendarEvent extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->calendar_id) !== true) {
            throw new Exceptions\RuntimeException(
                'calendar_id is required for delete_calendar_event'
            );
        }
        $calendar_id = $this->calendar_id;
        if (isset($this->event_id) !== true) {
            throw new Exceptions\RuntimeException(
                'event_id is required for delete_calendar_event'
            );
        }
        $event_id = $this->event_id;

        return "/_xpack/ml/calendars/$calendar_id/events/$event_id";
    }

    public function getParamWhitelist(): array
    {
        return [];
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }
    
    public function setCalendarId($calendar_id): DeleteCalendarEvent
    {
        if (isset($calendar_id) !== true) {
            return $this;
        }
        $this->calendar_id = $calendar_id;

        return $this;
    }

    public function setEventId($event_id): DeleteCalendarEvent
    {
        if (isset($event_id) !== true) {
            return $this;
        }
        $this->event_id = $event_id;

        return $this;
    }

}
