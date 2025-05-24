<?php

namespace Modules\Service\Entities;

use Spatie\Sluggable\SlugOptions;
use Modules\Core\Traits\ScopesTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;
use Spatie\Sluggable\HasTranslatableSlug;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasTranslations ;
    use ScopesTrait ;
    use SoftDeletes;
    use HasTranslatableSlug;

    protected $fillable= ['description' , 'title' , 'slug', 'status' , 'image' , 'link' , 'color'];
    public $translatable  = [ 'description' , 'title' , 'slug'];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function availableColors(): array
    {
        return [
            "breathing" =>'Blue',
            "meditation"=>'Purple',
            "therapy"   =>'Green',
            "education" =>'Gray'
        ];
    }
}
