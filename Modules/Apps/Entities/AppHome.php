<?php

namespace Modules\Apps\Entities;

use Carbon\Carbon;
use Modules\Catalog\Entities\Brand;
use Modules\Course\Entities\Course;
use Modules\Slider\Entities\Banner;
use Modules\Slider\Entities\Slider;
use Modules\Core\Traits\ScopesTrait;
use Modules\Catalog\Entities\Product;
use Modules\Slider\Entities\Instagram;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ResponseCache\Facades\ResponseCache;
use Modules\Advertising\Entities\AdvertisingGroup;

class AppHome extends Model
{
    use HasTranslations, SoftDeletes, ScopesTrait;

    const TYPES = [
        'courses',
        'sliders',
        'categories',
        'description',
    ];
    protected $table = 'app_homes';
    protected $casts = [
        'classes' => 'array'
    ];
    protected $fillable = ["short_title", "title", "description", "type", 'order', 'add_dates', 'start_at', 'end_at', 'status', 'classes'];
    public $translatable = ['title', 'short_title', 'description'];

    public function courses()
    {
        return $this->morphedByMany(Course::class, 'homable', 'homables');
    }

    public function sliders()
    {
        return $this->morphedByMany(Slider::class, 'homable', 'homables');
    }

    public function categories()
    {
        return $this->morphedByMany(Category::class, 'homable', 'homables');
    }

    // public function brand()
    // {
    //     return $this->morphedByMany(Brand::class, 'homable','homables');
    // }

    static function typesForSelect($display_name_type = 'slider_type')
    {
        $array = [];
        foreach (self::TYPES as $type) {
            $array[$type] = __('apps::dashboard.app_homes.form.' . $display_name_type . '.' . $type);
        }

        return $array;
    }

    static function getClassByType($type)
    {

        switch ($type) {
            case 'courses':
                return new Course();
            case 'sliders':
                return new Slider();
            case 'categories':
                return new Category();
        }
    }

    static function getClassNameByType($type)
    {
        return $type;
    }


    public function scopePublished($query)
    {
        return $query->where('add_dates', 0)->orWhere(function ($q) {
            $q->where(function ($q) {
                $q->whereDate('start_at', '<=', Carbon::now())
                    ->orWhereNull('start_at');
            })->where(function ($q) {
                $q->whereDate('end_at', '>=', Carbon::now())
                    ->orWhereNull('end_at');
            });
        });
    }
}
