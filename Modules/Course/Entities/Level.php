<?php

namespace Modules\Course\Entities;

use Spatie\MediaLibrary\HasMedia;
use Modules\Core\Traits\ScopesTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Level extends Model implements HasMedia
{
    use HasTranslations ;
    use ScopesTrait;
    use SoftDeletes;
    use InteractsWithMedia;
    public $fillable = ['title','short_desc','desc','start_exam','end_exam','requirements','require_start_exam','require_end_exam','paid','price'];
    public $translatable  = ['title','short_desc','desc','requirements'];
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * Get the user that owns the Level
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function startExam(): BelongsTo
    {
        return $this->belongsTo(Exam::class, 'start_exam', 'id');
    }

    /**
     * Get the user that owns the Level
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function endExam(): BelongsTo
    {
        return $this->belongsTo(Exam::class, 'end_exam', 'id');
    }



    public static function boot()
    {
        parent::boot();

        self::saving(function ($model) {
            if (!$model->require_end_exam) {
                $model->end_exam=null;
            }
            if (!$model->require_start_exam) {
                $model->start_exam=null;
            }
            if (!$model->paid) {
                $model->price=0;
            }
        });
    }
}
