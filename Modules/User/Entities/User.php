<?php

namespace Modules\User\Entities;

use Modules\Order\Entities\Order;
use Modules\Exam\Entities\UserExam;
use Modules\Order\Entities\Address;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Traits\ScopesTrait;
use Modules\Course\Entities\UserVideo;
use Spatie\Permission\Traits\HasRoles;
use Modules\Order\Entities\OrderCourse;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Modules\Course\Entities\CourseReview;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Modules\Membership\Entities\Membership;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

class User extends Authenticatable
{
    use Notifiable;
    use ScopesTrait;
    use HasRoles;
    use SchemalessAttributesTrait;

    use SoftDeletes {
        restore as private restoreB;
    }

    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'image', 'extra', 'parent_id', 'country_code'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'extra' => SchemalessAttributes::class,

    ];

    public function setPasswordAttribute($value)
    {
        if ($value === null || !is_string($value)) {
            return;
        }
        $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }


    public function setImageAttribute($value)
    {
        if (!$value) {
            $this->attributes['image'] = '/uploads/users/user.png';
        }
        $this->attributes['image'] = $value;
    }





    public function restore()
    {
        $this->restoreB();
    }

    public function orders()
    {
        return $this->hasMany(\Modules\Order\Entities\Order::class);
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function answers()
    {
        return $this->hasMany(UserAnswer::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function children()
    {
        return $this->hasMany(User::class, 'parent_id');
    }


    /**
     * @var array
     */
    protected $schemalessAttributes = [
        'extra',
    ];

    public function scopeWithExtra(): Builder
    {
        return $this->extra->modelScope();
    }


    /**
     * Get all of the UserExams for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function UserExams(): HasMany
    {
        return $this->hasMany(UserExam::class);
    }


    public function courseReview()
    {
        return $this->hasMany(CourseReview::class);
    }

    public function receiverMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }


    /**
     * Get all of the userVideos for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userVideos(): HasMany
    {
        return $this->hasMany(UserVideo::class);
    }


    /**
     * Get all of the orderCourses for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function orderCourses(): HasManyThrough
    {
        return $this->hasManyThrough(OrderCourse::class, Order::class);
    }


    public function getMembership()
    {
        return Membership::where('courses_count', '<=', $this->orderCourses()->where('is_watched', 1)->count())->first();
    }

    public function nameWithMembership()
    {
        $membership = $this->getMembership();
        $path = optional($membership)->getFirstMediaUrl('images');
        $image = $membership ?
            "<img class='membership-icon' src='$path' alt='$membership->title' >" : "";
        return $this->name . ($image ??  "");
    }
}
