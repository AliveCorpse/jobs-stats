<?php

namespace Crazybooot\JobsStats\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Attempt
 *
 * @package Crazybooot\JobsStats\Models
 */
class Attempt extends Model
{
    const STATUS_STARTED = 'STATUS_STARTED';
    const STATUS_FAILED = 'STATUS_FAILED';
    const STATUS_COMPLETED = 'STATUS_COMPLETED';

    protected $table = 'jobs_stats_job_attempts';

    protected $fillable = [
        'jobs_stats_job_id',
        'attempt_number',
        'started_at',
        'finished_at',
        'handling_duration',
        'waiting_duration',
        'queries_count',
        'queries_duration',
        'status',
        'exception_message',
        'exception_call_stack',
    ];

    protected $casts = [
        'jobs_stats_job_id'    => 'integer',
        'attempt_number'       => 'integer',
        'started_at'           => 'float',
        'finished_at'          => 'float',
        'handling_duration'    => 'float',
        'waiting_duration'     => 'float',
        'queries_count'        => 'integer',
        'queries_duration'     => 'float',
        'status'               => 'string',
        'exception_message'    => 'string',
        'exception_call_stack' => 'array',
    ];

    /**
     * @return BelongsTo
     */
    public function job()
    {
        return $this->belongsTo(Job::class, 'jobs_stats_job_id', 'id', 'jobs_stats_jobs');
    }

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeStarted(Builder $builder)
    {
        return $builder->where('status', self::STATUS_STARTED);
    }

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeCompleted(Builder $builder)
    {
        return $builder->where('status', self::STATUS_COMPLETED);
    }

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopeFailed(Builder $builder)
    {
        return $builder->where('status', self::STATUS_FAILED);
    }
}