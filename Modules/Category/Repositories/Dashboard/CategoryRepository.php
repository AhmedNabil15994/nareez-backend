<?php

namespace Modules\Category\Repositories\Dashboard;

use Illuminate\Http\Request;
use Modules\Category\Entities\Category;
use DB;
use Modules\Core\Repositories\Dashboard\CrudRepository;

class CategoryRepository extends CrudRepository
{
    public function __construct()
    {
        parent::__construct(Category::class);
        $this->fileAttribute=['image'=>'image'];
    }

    public function mainCategories($order = 'id', $sort = 'desc')
    {
        $categories = $this->model->mainCategories()->orderBy($order, $sort)->get();
        return $categories;
    }
}
