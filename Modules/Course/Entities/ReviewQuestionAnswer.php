<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class ReviewQuestionAnswer extends Model
{
    protected $fillable = ['course_review_id', 'review_question_id', 'answer'];



    public function review()
    {
        return $this->belongsTo(CourseReview::class);
    }

    public function reviewQuestion()
    {
        return $this->belongsTo(ReviewQuestion::class);
    }
}
