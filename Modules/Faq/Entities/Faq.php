<?php

namespace Modules\Faq\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;
use Modules\Core\Traits\ScopesTrait;

class Faq extends Model
{
    use HasTranslations ;
    use SoftDeletes ;
    use ScopesTrait;
    protected $fillable  = ['status','title','desc'];
    public $translatable  = ['title','desc'];
}
