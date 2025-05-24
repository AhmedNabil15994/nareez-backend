<?php

namespace Modules\About\Entities;

use Modules\Core\Traits\ScopesTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;

class About extends Model
{
    use HasTranslations;
    use ScopesTrait;

    protected $fillable = ['title', 'desc', 'image', 'type','status','link'];
    public $translatable  = ['title','desc'];
}
