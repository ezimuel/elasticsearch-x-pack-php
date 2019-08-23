<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Ml;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class DeleteCalendarJob
 * Generated by util/GenerateEndpoints.php
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class DeleteCalendarJob extends AbstractEndpoint
{
    public function getURI(): string
    {
        if (isset($this->calendar_id) !== true) {
            throw new Exceptions\RuntimeException(
                'calendar_id is required for delete_calendar_job'
            );
        }
        $calendar_id = $this->calendar_id;
        if (isset($this->job_id) !== true) {
            throw new Exceptions\RuntimeException(
                'job_id is required for delete_calendar_job'
            );
        }
        $job_id = $this->job_id;

        if (isset($calendar_id) && isset($job_id)) {
            return "/_xpack/ml/calendars/$calendar_id/jobs/$job_id";
        }
    }

    public function getParamWhitelist(): array
    {
        return [
            
        ];
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }
    
    public function setCalendarId($calendar_id): DeleteCalendarJob
    {
        if (isset($calendar_id) !== true) {
            return $this;
        }
        $this->calendar_id = $calendar_id;

        return $this;
    }

    public function setJobId($job_id): DeleteCalendarJob
    {
        if (isset($job_id) !== true) {
            return $this;
        }
        $this->job_id = $job_id;

        return $this;
    }

}
