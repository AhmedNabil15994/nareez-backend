<?php

namespace Modules\Category\Repositories\Frontend;

use Modules\Category\Entities\Category;
use DB;

class CategoryRepository
{
    public function __construct(Category $category)
    {
        $this->category   = $category;
    }

    public function mainCategories($order = 'id', $sort = 'ASC')
    {
        $categories = $this->category->mainCategories()->active()->orderBy($order, $sort)->get();
        return $categories;
    }

    public function findBySlug($slug)
    {
        return $this->category->active()->where('slug->'.locale(), $slug)->firstOrFail();
    }
}
