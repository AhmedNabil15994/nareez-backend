<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [
        'name_ar',
        'name_en',
        'birthday',
        'age',
        'gender',
        'nationality',
        'street',
        'address',
        'is_reviewed',
        'user_id',
        'note',
        'emergency_full_name',
        'emergency_relative_relation',
        'emergency_phone_number',
        'terms_accepted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
