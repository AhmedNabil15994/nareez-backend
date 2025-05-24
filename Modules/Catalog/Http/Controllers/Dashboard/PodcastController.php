<?php

namespace Modules\Catalog\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;
use Modules\Core\Traits\Dashboard\CrudDashboardController;
use Modules\Course\Repositories\Dashboard\CourseVideoApiRepository;

class PodcastController extends Controller
{
    use CrudDashboardController;

    public function edit($id)
    {
        $model = $this->repository->findById($id);
        $model_view = (new CourseVideoApiRepository())->buildVideo(optional($model)->video_link);
        return $this->view('edit', compact('model', 'model_view'));
    }
}
