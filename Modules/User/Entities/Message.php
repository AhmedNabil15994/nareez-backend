<?php

namespace Modules\User\Entities;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model implements HasMedia
{
    use  InteractsWithMedia;
    protected $fillable = ['sender_id','receiver_id','message','thread_id'];

    /**
     * Get the receiver that owns the Message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    /**
     * Get the sender that owns the Message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * The thread that belong to the Message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thread(): BelongsTo
    {
        return $this->belongsTo(Thread::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $model->thread()->update(['updated_at'=>$model->created_at]) ;
        });
    }
}
