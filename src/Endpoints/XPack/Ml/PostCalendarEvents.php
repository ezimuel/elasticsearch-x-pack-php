<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\XPack\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class PostCalendarEvents
 * Elasticsearch API name xpack.ml.post_calendar_events
 * Generated running $ php util/GenerateEndpoints.php 6.3.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\XPack\\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class PostCalendarEvents extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->calendar_id) !== true) {
            throw new Exceptions\RuntimeException(
                'calendar_id is required for post_calendar_events'
            );
        }
        $calendar_id = $this->calendar_id;

        return "/_xpack/ml/calendars/$calendar_id/events";
    }

    public function getParamWhitelist(): array
    {
        return [];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
    public function setPostCalendarEvents($body): PostCalendarEvents
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setPostCalendarEvents($calendar_id): PostCalendarEvents
    {
        if (isset($calendar_id) !== true) {
            return $this;
        }
        $this->calendar_id = $calendar_id;

        return $this;
    }

}
