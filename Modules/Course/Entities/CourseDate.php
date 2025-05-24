<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseDate extends Model
{
    protected $fillable = [
        'day',
        'duration',
        'course_id',
        'meeting_create',
        'start_time',
         ];


    /**
     * Get the course that owns the CourseDate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
