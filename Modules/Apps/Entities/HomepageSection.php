<?php

namespace Modules\Apps\Entities;

use Modules\Core\Traits\ScopesTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;

class HomepageSection extends Model
{
    use HasTranslations;
    use ScopesTrait;

    protected $fillable = ['title', 'desc', 'image', 'type','status','link'];
    public $translatable  = ['title','desc'];
}
