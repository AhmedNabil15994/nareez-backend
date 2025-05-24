<?php

namespace Modules\Course\Entities;

use Carbon\Carbon;
use Modules\Order\Entities\Order;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Facades\DB;
use Modules\Core\Traits\ScopesTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
use Modules\Order\Entities\OrderCourse;
use Modules\Core\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Course\Entities\CourseEnrollment;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Core\Traits\HasSlugTranslation;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

class Course extends Model
{
    use HasTranslations;
    use SoftDeletes;
    use ScopesTrait;
    use HasSlugTranslation;

    protected $fillable = [
        'is_published',
        'is_live',
        'is_certificated',
        'price',
        'image',
        'class_time',
        'trainer_id',
        'period',
        'description',
        'title',
        'slug',
        'requirements',
        'level_id',
        'short_desc',
        'extra_attributes',
    ];

    public $translatable  = ['description', 'title', 'slug', 'requirements', 'short_desc'];

    public $with = ['video'];
    public $sluggable    = 'title';
    public $casts = [
        'extra_attributes' => SchemalessAttributes::class,
    ];



    public function scopeWithExtraAttributes(): Builder
    {
        return $this->extra_attributes->modelScope();
    }

    public function orderCourse()
    {
        return $this->hasMany(OrderCourse::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'course_categories');
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function trainer()
    {
        return $this->belongsTo(\Modules\Trainer\Entities\Trainer::class);
    }

    public function subscribed()
    {
        return $this->orderCourse()
            ->where('user_id', auth()->id())
            ->where(function ($q) {
                $q->whereNull('expired_date')->orWhere('expired_date', '>=', Carbon::now()->toDateTimeString());
            })->whereHas('order', function ($query) {
                $query->whereHas('orderStatus', function ($query) {
                    $query->successPayment();
                });
            });
    }



    public function gallery()
    {
        return $this->hasMany(CourseImage::class);
    }

    public function video()
    {
        return $this->morphOne(Video::class, 'videoable');
    }


    /**
     * Get all of the targets for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function targets()
    {
        return $this->hasMany(CourseTarget::class);
    }
    /**
     * Get all of the courseReviews for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseReviews()
    {
        return $this->hasMany(CourseReview::class);
    }


    public function activeCourseReviews()
    {
        return $this->hasMany(CourseReview::class)->where('status', 1);
    }




    public function meeting()
    {
        return $this->morphOne(Meeting::class, 'meetingable');
    }
    /**
     * Get all of the dates for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dates(): HasMany
    {
        return $this->hasMany(CourseDate::class);
    }
    public function lessonContents()
    {
        return $this->hasManyThrough(LessonContent::class, Lesson::class);
    }
    public function isFinished()
    {
        return $this->orderCourse()
            ->where(['user_id' => auth()->id(), 'is_watched' => 1])
            ->whereHas('order', function ($query) {
                $query->whereHas('orderStatus', function ($query) {
                    $query->successPayment();
                });
            })->count();
    }


    public function isReviewed()
    {
        return $this->courseReviews()->where(['user_id' => auth()->id()])->exists();
    }



    protected static function booted()
    {
        static::addGlobalScope('withReviews', function ($query) {
            $query->withCount(['courseReviews as stars' => function ($q) {
                $q->select(DB::raw('avg(course_reviews.stars) as stars'));
            }]);
        });
    }

    public function ScopeCategories($q, $categories)
    {
        return $q->whereHas(
            'categories',
            fn ($q) => $q->whereIn('course_categories.category_id', $categories)

        );
    }
    public function ScopeSubscribed($q, $user_id)
    {
        return $q
            ->withCount(
                [
                    'orderCourse as is_subscribed' =>
                    fn ($q) => $q
                        ->whereUserId($user_id)
                        ->notExpired()
                        ->successPay()
                ]
            );
    }



    public function ScopeTrainer($q, $trainerId)
    {
        return $q->whereTrainerId($trainerId);
    }

    public function ScopeSearch($q, $search)
    {
        return $q
            ->where(
                fn ($query) =>
                $query
                    ->Where("title->" . locale(), 'like', '%' . $search . '%')
                    ->orWhere("slug->" . locale(), 'like', '%' . $search . '%')
            );
    }
}
