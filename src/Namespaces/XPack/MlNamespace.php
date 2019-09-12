<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces\XPack;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class MlNamespace
 * Generated running $ php util/GenerateEndpoints.php 6.3.2
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\XPack
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class MlNamespace extends AbstractNamespace
{
        /**
     * Endpoint: xpack.ml.close_job
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-close-job.html
     *
     * $params[
     *   'job_id'        => '(string) The name of the job to close (Required)',
     *   'allow_no_jobs' => '(boolean) Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)',
     *   'force'         => '(boolean) True if the job should be forcefully closed',
     *   'timeout'       => '(time) Controls the time to wait until a job has closed. Default to 30 minutes',
     * ]
     */
    public function closeJob(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\CloseJob;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.delete_calendar
     * $params[
     *   'calendar_id' => '(string) The ID of the calendar to delete (Required)',
     * ]
     */
    public function deleteCalendar(array $params = [])
    {
        $calendar_id = $this->extractArgument($params, 'calendar_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\DeleteCalendar;
        $endpoint->setParams($params);
        $endpoint->setCalendarId($calendar_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.delete_calendar_event
     * $params[
     *   'calendar_id' => '(string) The ID of the calendar to modify (Required)',
     *   'event_id'    => '(string) The ID of the event to remove from the calendar (Required)',
     * ]
     */
    public function deleteCalendarEvent(array $params = [])
    {
        $calendar_id = $this->extractArgument($params, 'calendar_id');
        $event_id = $this->extractArgument($params, 'event_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\DeleteCalendarEvent;
        $endpoint->setParams($params);
        $endpoint->setCalendarId($calendar_id);
        $endpoint->setEventId($event_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.delete_calendar_job
     * $params[
     *   'calendar_id' => '(string) The ID of the calendar to modify (Required)',
     *   'job_id'      => '(string) The ID of the job to remove from the calendar (Required)',
     * ]
     */
    public function deleteCalendarJob(array $params = [])
    {
        $calendar_id = $this->extractArgument($params, 'calendar_id');
        $job_id = $this->extractArgument($params, 'job_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\DeleteCalendarJob;
        $endpoint->setParams($params);
        $endpoint->setCalendarId($calendar_id);
        $endpoint->setJobId($job_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.delete_datafeed
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-datafeed.html
     *
     * $params[
     *   'datafeed_id' => '(string) The ID of the datafeed to delete (Required)',
     *   'force'       => '(boolean) True if the datafeed should be forcefully deleted',
     * ]
     */
    public function deleteDatafeed(array $params = [])
    {
        $datafeed_id = $this->extractArgument($params, 'datafeed_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\DeleteDatafeed;
        $endpoint->setParams($params);
        $endpoint->setDatafeedId($datafeed_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.delete_expired_data
     */
    public function deleteExpiredData(array $params = [])
    {

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\DeleteExpiredData;
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.delete_filter
     * $params[
     *   'filter_id' => '(string) The ID of the filter to delete (Required)',
     * ]
     */
    public function deleteFilter(array $params = [])
    {
        $filter_id = $this->extractArgument($params, 'filter_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\DeleteFilter;
        $endpoint->setParams($params);
        $endpoint->setFilterId($filter_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.delete_job
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-job.html
     *
     * $params[
     *   'job_id' => '(string) The ID of the job to delete (Required)',
     *   'force'  => '(boolean) True if the job should be forcefully deleted',
     * ]
     */
    public function deleteJob(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\DeleteJob;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.delete_model_snapshot
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-snapshot.html
     *
     * $params[
     *   'job_id'      => '(string) The ID of the job to fetch (Required)',
     *   'snapshot_id' => '(string) The ID of the snapshot to delete (Required)',
     * ]
     */
    public function deleteModelSnapshot(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');
        $snapshot_id = $this->extractArgument($params, 'snapshot_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\DeleteModelSnapshot;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);
        $endpoint->setSnapshotId($snapshot_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.flush_job
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-flush-job.html
     *
     * $params[
     *   'body'         => '(string) Flush parameters',
     *   'job_id'       => '(string) The name of the job to flush (Required)',
     *   'calc_interim' => '(boolean) Calculates interim results for the most recent bucket or all buckets within the latency period',
     *   'start'        => '(string) When used in conjunction with calc_interim, specifies the range of buckets on which to calculate interim results',
     *   'end'          => '(string) When used in conjunction with calc_interim, specifies the range of buckets on which to calculate interim results',
     *   'advance_time' => '(string) Advances time to the given value generating results and updating the model for the advanced interval',
     *   'skip_time'    => '(string) Skips time to the given value without generating results or updating the model for the skipped interval',
     * ]
     */
    public function flushJob(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\FlushJob;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.forecast
     * $params[
     *   'job_id'     => '(string) The ID of the job to forecast for (Required)',
     *   'duration'   => '(time) The duration of the forecast',
     *   'expires_in' => '(time) The time interval after which the forecast expires. Expired forecasts will be deleted at the first opportunity.',
     * ]
     */
    public function forecast(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\Forecast;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.get_buckets
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-bucket.html
     *
     * $params[
     *   'body'            => '(string) Bucket selection details if not provided in URI',
     *   'job_id'          => '(string) ID of the job to get bucket results from (Required)',
     *   'timestamp'       => '(string) The timestamp of the desired single bucket result',
     *   'expand'          => '(boolean) Include anomaly records',
     *   'exclude_interim' => '(boolean) Exclude interim results',
     *   'from'            => '(int) skips a number of buckets',
     *   'size'            => '(int) specifies a max number of buckets to get',
     *   'start'           => '(string) Start time filter for buckets',
     *   'end'             => '(string) End time filter for buckets',
     *   'anomaly_score'   => '(double) Filter for the most anomalous buckets',
     *   'sort'            => '(string) Sort buckets by a particular field',
     *   'desc'            => '(boolean) Set the sort direction',
     * ]
     */
    public function getBuckets(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');
        $timestamp = $this->extractArgument($params, 'timestamp');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\GetBuckets;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);
        $endpoint->setTimestamp($timestamp);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.get_calendar_events
     * $params[
     *   'calendar_id' => '(string) The ID of the calendar containing the events (Required)',
     *   'job_id'      => '(string) Get events for the job. When this option is used calendar_id must be '_all'',
     *   'start'       => '(string) Get events after this time',
     *   'end'         => '(date) Get events before this time',
     *   'from'        => '(int) Skips a number of events',
     *   'size'        => '(int) Specifies a max number of events to get',
     * ]
     */
    public function getCalendarEvents(array $params = [])
    {
        $calendar_id = $this->extractArgument($params, 'calendar_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\GetCalendarEvents;
        $endpoint->setParams($params);
        $endpoint->setCalendarId($calendar_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.get_calendars
     * $params[
     *   'calendar_id' => '(string) The ID of the calendar to fetch',
     *   'from'        => '(int) skips a number of calendars',
     *   'size'        => '(int) specifies a max number of calendars to get',
     * ]
     */
    public function getCalendars(array $params = [])
    {
        $calendar_id = $this->extractArgument($params, 'calendar_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\GetCalendars;
        $endpoint->setParams($params);
        $endpoint->setCalendarId($calendar_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.get_categories
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-category.html
     *
     * $params[
     *   'body'        => '(string) Category selection details if not provided in URI',
     *   'job_id'      => '(string) The name of the job (Required)',
     *   'category_id' => '(long) The identifier of the category definition of interest',
     *   'from'        => '(int) skips a number of categories',
     *   'size'        => '(int) specifies a max number of categories to get',
     * ]
     */
    public function getCategories(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');
        $category_id = $this->extractArgument($params, 'category_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\GetCategories;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);
        $endpoint->setCategoryId($category_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.get_datafeed_stats
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-datafeed-stats.html
     *
     * $params[
     *   'datafeed_id'        => '(string) The ID of the datafeeds stats to fetch',
     *   'allow_no_datafeeds' => '(boolean) Whether to ignore if a wildcard expression matches no datafeeds. (This includes `_all` string or when no datafeeds have been specified)',
     * ]
     */
    public function getDatafeedStats(array $params = [])
    {
        $datafeed_id = $this->extractArgument($params, 'datafeed_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\GetDatafeedStats;
        $endpoint->setParams($params);
        $endpoint->setDatafeedId($datafeed_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.get_datafeeds
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-datafeed.html
     *
     * $params[
     *   'datafeed_id'        => '(string) The ID of the datafeeds to fetch',
     *   'allow_no_datafeeds' => '(boolean) Whether to ignore if a wildcard expression matches no datafeeds. (This includes `_all` string or when no datafeeds have been specified)',
     * ]
     */
    public function getDatafeeds(array $params = [])
    {
        $datafeed_id = $this->extractArgument($params, 'datafeed_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\GetDatafeeds;
        $endpoint->setParams($params);
        $endpoint->setDatafeedId($datafeed_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.get_filters
     * $params[
     *   'filter_id' => '(string) The ID of the filter to fetch',
     *   'from'      => '(int) skips a number of filters',
     *   'size'      => '(int) specifies a max number of filters to get',
     * ]
     */
    public function getFilters(array $params = [])
    {
        $filter_id = $this->extractArgument($params, 'filter_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\GetFilters;
        $endpoint->setParams($params);
        $endpoint->setFilterId($filter_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.get_influencers
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-influencer.html
     *
     * $params[
     *   'body'             => '(string) Influencer selection criteria',
     *   'job_id'           => '(string)  (Required)',
     *   'exclude_interim'  => '(boolean) Exclude interim results',
     *   'from'             => '(int) skips a number of influencers',
     *   'size'             => '(int) specifies a max number of influencers to get',
     *   'start'            => '(string) start timestamp for the requested influencers',
     *   'end'              => '(string) end timestamp for the requested influencers',
     *   'influencer_score' => '(double) influencer score threshold for the requested influencers',
     *   'sort'             => '(string) sort field for the requested influencers',
     *   'desc'             => '(boolean) whether the results should be sorted in decending order',
     * ]
     */
    public function getInfluencers(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\GetInfluencers;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.get_job_stats
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-job-stats.html
     *
     * $params[
     *   'job_id'        => '(string) The ID of the jobs stats to fetch',
     *   'allow_no_jobs' => '(boolean) Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)',
     * ]
     */
    public function getJobStats(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\GetJobStats;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.get_jobs
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-job.html
     *
     * $params[
     *   'job_id'        => '(string) The ID of the jobs to fetch',
     *   'allow_no_jobs' => '(boolean) Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)',
     * ]
     */
    public function getJobs(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\GetJobs;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.get_model_snapshots
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-snapshot.html
     *
     * $params[
     *   'body'        => '(string) Model snapshot selection criteria',
     *   'job_id'      => '(string) The ID of the job to fetch (Required)',
     *   'snapshot_id' => '(string) The ID of the snapshot to fetch',
     *   'from'        => '(int) Skips a number of documents',
     *   'size'        => '(int) The default number of documents returned in queries as a string.',
     *   'start'       => '(date) The filter 'start' query parameter',
     *   'end'         => '(date) The filter 'end' query parameter',
     *   'sort'        => '(string) Name of the field to sort on',
     *   'desc'        => '(boolean) True if the results should be sorted in descending order',
     * ]
     */
    public function getModelSnapshots(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');
        $snapshot_id = $this->extractArgument($params, 'snapshot_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\GetModelSnapshots;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);
        $endpoint->setSnapshotId($snapshot_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.get_overall_buckets
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-overall-buckets.html
     *
     * $params[
     *   'body'            => '(string) Overall bucket selection details if not provided in URI',
     *   'job_id'          => '(string) The job IDs for which to calculate overall bucket results (Required)',
     *   'top_n'           => '(int) The number of top job bucket scores to be used in the overall_score calculation',
     *   'bucket_span'     => '(string) The span of the overall buckets. Defaults to the longest job bucket_span',
     *   'overall_score'   => '(double) Returns overall buckets with overall scores higher than this value',
     *   'exclude_interim' => '(boolean) If true overall buckets that include interim buckets will be excluded',
     *   'start'           => '(string) Returns overall buckets with timestamps after this time',
     *   'end'             => '(string) Returns overall buckets with timestamps earlier than this time',
     *   'allow_no_jobs'   => '(boolean) Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)',
     * ]
     */
    public function getOverallBuckets(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\GetOverallBuckets;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.get_records
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-record.html
     *
     * $params[
     *   'body'            => '(string) Record selection criteria',
     *   'job_id'          => '(string)  (Required)',
     *   'exclude_interim' => '(boolean) Exclude interim results',
     *   'from'            => '(int) skips a number of records',
     *   'size'            => '(int) specifies a max number of records to get',
     *   'start'           => '(string) Start time filter for records',
     *   'end'             => '(string) End time filter for records',
     *   'record_score'    => '(double) ',
     *   'sort'            => '(string) Sort records by a particular field',
     *   'desc'            => '(boolean) Set the sort direction',
     * ]
     */
    public function getRecords(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\GetRecords;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.info
     */
    public function info(array $params = [])
    {

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\Info;
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.open_job
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-open-job.html
     *
     * $params[
     *   'job_id'          => '(string) The ID of the job to open (Required)',
     *   'ignore_downtime' => '(boolean) Controls if gaps in data are treated as anomalous or as a maintenance window after a job re-start',
     *   'timeout'         => '(time) Controls the time to wait until a job has opened. Default to 30 minutes',
     * ]
     */
    public function openJob(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');
        $ignore_downtime = $this->extractArgument($params, 'ignore_downtime');
        $timeout = $this->extractArgument($params, 'timeout');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\OpenJob;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);
        $endpoint->setIgnoreDowntime($ignore_downtime);
        $endpoint->setTimeout($timeout);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.post_calendar_events
     * $params[
     *   'body'        => '(string) A list of events (Required)',
     *   'calendar_id' => '(string) The ID of the calendar to modify (Required)',
     * ]
     */
    public function postCalendarEvents(array $params = [])
    {
        $calendar_id = $this->extractArgument($params, 'calendar_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\PostCalendarEvents;
        $endpoint->setParams($params);
        $endpoint->setCalendarId($calendar_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.post_data
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-post-data.html
     *
     * $params[
     *   'body'        => '(string) The data to process (Required)',
     *   'job_id'      => '(string) The name of the job receiving the data (Required)',
     *   'reset_start' => '(string) Optional parameter to specify the start of the bucket resetting range',
     *   'reset_end'   => '(string) Optional parameter to specify the end of the bucket resetting range',
     * ]
     */
    public function postData(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\PostData;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.preview_datafeed
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-preview-datafeed.html
     *
     * $params[
     *   'datafeed_id' => '(string) The ID of the datafeed to preview (Required)',
     * ]
     */
    public function previewDatafeed(array $params = [])
    {
        $datafeed_id = $this->extractArgument($params, 'datafeed_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\PreviewDatafeed;
        $endpoint->setParams($params);
        $endpoint->setDatafeedId($datafeed_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.put_calendar
     * $params[
     *   'body'        => '(string) The calendar details',
     *   'calendar_id' => '(string) The ID of the calendar to create (Required)',
     * ]
     */
    public function putCalendar(array $params = [])
    {
        $calendar_id = $this->extractArgument($params, 'calendar_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\PutCalendar;
        $endpoint->setParams($params);
        $endpoint->setCalendarId($calendar_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.put_calendar_job
     * $params[
     *   'calendar_id' => '(string) The ID of the calendar to modify (Required)',
     *   'job_id'      => '(string) The ID of the job to add to the calendar (Required)',
     * ]
     */
    public function putCalendarJob(array $params = [])
    {
        $calendar_id = $this->extractArgument($params, 'calendar_id');
        $job_id = $this->extractArgument($params, 'job_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\PutCalendarJob;
        $endpoint->setParams($params);
        $endpoint->setCalendarId($calendar_id);
        $endpoint->setJobId($job_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.put_datafeed
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-datafeed.html
     *
     * $params[
     *   'body'        => '(string) The datafeed config (Required)',
     *   'datafeed_id' => '(string) The ID of the datafeed to create (Required)',
     * ]
     */
    public function putDatafeed(array $params = [])
    {
        $datafeed_id = $this->extractArgument($params, 'datafeed_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\PutDatafeed;
        $endpoint->setParams($params);
        $endpoint->setDatafeedId($datafeed_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.put_filter
     * $params[
     *   'body'      => '(string) The filter details (Required)',
     *   'filter_id' => '(string) The ID of the filter to create (Required)',
     * ]
     */
    public function putFilter(array $params = [])
    {
        $filter_id = $this->extractArgument($params, 'filter_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\PutFilter;
        $endpoint->setParams($params);
        $endpoint->setFilterId($filter_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.put_job
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-job.html
     *
     * $params[
     *   'body'   => '(string) The job (Required)',
     *   'job_id' => '(string) The ID of the job to create (Required)',
     * ]
     */
    public function putJob(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\PutJob;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.revert_model_snapshot
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-revert-snapshot.html
     *
     * $params[
     *   'body'                       => '(string) Reversion options',
     *   'job_id'                     => '(string) The ID of the job to fetch (Required)',
     *   'snapshot_id'                => '(string) The ID of the snapshot to revert to (Required)',
     *   'delete_intervening_results' => '(boolean) Should we reset the results back to the time of the snapshot?',
     * ]
     */
    public function revertModelSnapshot(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');
        $snapshot_id = $this->extractArgument($params, 'snapshot_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\RevertModelSnapshot;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);
        $endpoint->setSnapshotId($snapshot_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.start_datafeed
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-start-datafeed.html
     *
     * $params[
     *   'body'        => '(string) The start datafeed parameters',
     *   'datafeed_id' => '(string) The ID of the datafeed to start (Required)',
     *   'start'       => '(string) The start time from where the datafeed should begin',
     *   'end'         => '(string) The end time when the datafeed should stop. When not set, the datafeed continues in real time',
     *   'timeout'     => '(time) Controls the time to wait until a datafeed has started. Default to 20 seconds',
     * ]
     */
    public function startDatafeed(array $params = [])
    {
        $datafeed_id = $this->extractArgument($params, 'datafeed_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\StartDatafeed;
        $endpoint->setParams($params);
        $endpoint->setDatafeedId($datafeed_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.stop_datafeed
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-stop-datafeed.html
     *
     * $params[
     *   'datafeed_id'        => '(string) The ID of the datafeed to stop (Required)',
     *   'allow_no_datafeeds' => '(boolean) Whether to ignore if a wildcard expression matches no datafeeds. (This includes `_all` string or when no datafeeds have been specified)',
     *   'force'              => '(boolean) True if the datafeed should be forcefully stopped.',
     *   'timeout'            => '(time) Controls the time to wait until a datafeed has stopped. Default to 20 seconds',
     * ]
     */
    public function stopDatafeed(array $params = [])
    {
        $datafeed_id = $this->extractArgument($params, 'datafeed_id');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\StopDatafeed;
        $endpoint->setParams($params);
        $endpoint->setDatafeedId($datafeed_id);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.update_datafeed
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-update-datafeed.html
     *
     * $params[
     *   'body'        => '(string) The datafeed update settings (Required)',
     *   'datafeed_id' => '(string) The ID of the datafeed to update (Required)',
     * ]
     */
    public function updateDatafeed(array $params = [])
    {
        $datafeed_id = $this->extractArgument($params, 'datafeed_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\UpdateDatafeed;
        $endpoint->setParams($params);
        $endpoint->setDatafeedId($datafeed_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.update_job
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-update-job.html
     *
     * $params[
     *   'body'   => '(string) The job update settings (Required)',
     *   'job_id' => '(string) The ID of the job to create (Required)',
     * ]
     */
    public function updateJob(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\UpdateJob;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.update_model_snapshot
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/ml-update-snapshot.html
     *
     * $params[
     *   'body'        => '(string) The model snapshot properties to update (Required)',
     *   'job_id'      => '(string) The ID of the job to fetch (Required)',
     *   'snapshot_id' => '(string) The ID of the snapshot to update (Required)',
     * ]
     */
    public function updateModelSnapshot(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');
        $snapshot_id = $this->extractArgument($params, 'snapshot_id');
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\UpdateModelSnapshot;
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);
        $endpoint->setSnapshotId($snapshot_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.validate
     * $params[
     *   'body' => '(string) The job config (Required)',
     * ]
     */
    public function validate(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\Validate;
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Endpoint: xpack.ml.validate_detector
     * $params[
     *   'body' => '(string) The detector (Required)',
     * ]
     */
    public function validateDetector(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpoint = new \Elasticsearch\Endpoints\XPack\Ml\ValidateDetector;
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }

}
