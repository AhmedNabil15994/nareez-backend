<?php

namespace Modules\Membership\Entities;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;

class Membership extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasTranslations;
    public $fillable = ['title','courses_count'];
    public $translatable = ['title'];
}
