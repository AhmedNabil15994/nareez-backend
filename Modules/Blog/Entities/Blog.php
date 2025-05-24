<?php

namespace Modules\Blog\Entities;

use Spatie\Sluggable\SlugOptions;
use Modules\Core\Traits\ScopesTrait;
use Modules\Trainer\Entities\Trainer;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;
use Modules\Core\Traits\HasSlugTranslation;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasTranslations;
    use ScopesTrait;
    use SoftDeletes;
    use HasSlugTranslation;

    protected $fillable = ['status', 'image', 'video', 'is_news','description', 'title', 'slug','trainer_id'];
    public $translatable = ['description', 'title', 'slug'];
    public $sluggable    = 'title';
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

 
}
