<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Traits\HasTranslations;
use Modules\Core\Traits\ScopesTrait;

class Lesson extends Model
{
    use HasTranslations ;
    use ScopesTrait;
    use SoftDeletes;

    protected $fillable = [ 'course_id' , 'status' , 'image','title' ];
    public $translatable  = [ 'title' ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessonContents()
    {
        return $this->hasMany(LessonContent::class)->oldest('order');
    }
}
