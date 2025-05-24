<?php

namespace Modules\Page\Entities;

use Spatie\Sluggable\SlugOptions;
use Modules\Core\Traits\ScopesTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;
use Spatie\Sluggable\HasTranslatableSlug;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasTranslations;
    use SoftDeletes;
    use ScopesTrait;
    use HasTranslatableSlug;

    protected $fillable = ['status', 'type', 'page_id', 'description', 'title', 'slug', 'seo_description', 'seo_keywords'];
    public $translatable = ['description', 'title', 'slug', 'seo_description', 'seo_keywords'];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
