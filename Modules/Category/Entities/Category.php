<?php

namespace Modules\Category\Entities;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Modules\Core\Traits\ScopesTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Traits\HasSlugTranslation;
use Spatie\Sluggable\HasTranslatableSlug;

class Category extends Model
{
    use HasTranslations ;
    use SoftDeletes ;
    use ScopesTrait;
    use HasSlugTranslation;


    protected $fillable = [ 'sorting' , 'status' , 'image' , 'category_id' , 'color','title' , 'slug' , 'description'] ;
    public $translatable = [ 'title'  , 'slug','description'];
    protected $appends = ['parents'];
    protected $with = ['children'];
      public $sluggable    = 'title';

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    public function getParentsAttribute()
    {
        $parents = collect([]);

        $parent = $this->parent;

        while (!is_null($parent)) {
            $parents->push($parent);
            $parent = $parent->parent;
        }

        return $parents;
    }


}
