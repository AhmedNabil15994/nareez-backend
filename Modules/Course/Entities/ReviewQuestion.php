<?php

namespace Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Traits\HasTranslations;
use Modules\Core\Traits\ScopesTrait;

class ReviewQuestion extends Model
{
    use HasTranslations;
    use ScopesTrait;
    use SoftDeletes;

    protected $fillable = ['title', 'status'];

    public $translatable = ['title'];
}
