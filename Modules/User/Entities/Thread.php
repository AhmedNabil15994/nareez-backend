<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Thread extends Model
{
    protected $fillable = ['first_side', 'second_side'];

    public $with = ['messages'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get the user that owns the Thread
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function firstSide(): BelongsTo
    {
        return $this->belongsTo(User::class, 'first_side');
    }
    /**
     * Get the user that owns the Thread
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function secondSide(): BelongsTo
    {
        return $this->belongsTo(User::class, 'second_side');
    }

    public function scopeDefaultThread(Builder $builder)
    {
        return $builder->whereFirstSide(null)->whereSecondSide(auth()->id());
    }
    public function scopeOldChatWithOutDefaultThread(Builder $builder)
    {
        return $builder->where('first_side' , '!=' , null)->where(function (Builder $query) {
            return $query->where('first_side', auth()->id())->orWhere('second_side', auth()->id());
        });
    }
}
