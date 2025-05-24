<?php

namespace Modules\Testimonial\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;
use Modules\Core\Traits\ScopesTrait;

class Testimonial extends Model
{
    use HasTranslations ;
    use ScopesTrait ;
    use SoftDeletes;

    protected $fillable 		  = ['desc' , 'title', 'status' , 'image' ];
    public $translatable  = [ 'desc' , 'title' ];
}
