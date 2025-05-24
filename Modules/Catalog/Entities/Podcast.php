<?php

namespace Modules\Catalog\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;
use Modules\Core\Traits\ScopesTrait;
use Modules\Course\Entities\ObtainCredential;
use Modules\Course\Repositories\Dashboard\CourseVideoApiRepository;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Podcast extends Model implements HasMedia
{
    use HasTranslations ;
    use ScopesTrait;
    use InteractsWithMedia;

    protected $fillable = ['video_link' , 'status' ,'duration', 'video_length' , 'thumb','title','loading_status'];
    public $translatable  = [ 'title' ];

    public function scopeActive($query)
    {
        return $query->where('status', true)->where(function ($q) {
        });
    }

    public function credential()
    {
        return $this->hasOne(ObtainCredential::class, 'api_video_id', 'video_link');
    }

    public function getVideoStatusAttribute()
    {
        if (optional($this->credential)->status && optional($this->credential)->status == 'pending') {
            $video_status = CourseVideoApiRepository::checkVideoStatus($this->video_link);

            if ($video_status && $video_status == 'ready') {
                $this->credential()->update(['status' => 'loaded']);
                return 'loaded';
            }
        }
        return optional($this->credential)->status;
    }
}
