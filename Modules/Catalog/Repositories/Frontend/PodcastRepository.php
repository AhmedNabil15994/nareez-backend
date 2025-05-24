<?php

namespace Modules\Catalog\Repositories\Frontend;

use Carbon\Carbon;
use Modules\Catalog\Entities\Podcast;
use Modules\Course\Entities\Course;
use Hash;
use DB;

class PodcastRepository
{
    public function __construct()
    {
        $this->model   = new Podcast();
    }

    public function getAll($paginate = null, $order = 'id', $sort = 'desc')
    {
        $models = $this->model->active();
        return $models->orderBy($order, $sort)->paginate($paginate ?? 9);
    }

    public function findCourseBySlug($slug)
    {
        return $this->model->active()->where('slug->'. locale(), $slug)->first();
    }
}
