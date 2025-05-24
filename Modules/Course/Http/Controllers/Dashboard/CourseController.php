<?php

namespace Modules\Course\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller;
use Modules\Course\Entities\Course;
use Modules\Core\Traits\Dashboard\CrudDashboardController;
use Modules\Course\Repositories\Dashboard\CourseVideoApiRepository;

class CourseController extends Controller
{
    use CrudDashboardController {
        CrudDashboardController::__construct as private __tConstruct;
    }
    private $video_api;

    public function __construct(Course $course, CourseVideoApiRepository $videoApi)
    {
        $this->__tConstruct();
        $this->model = $course;
        $this->video_api = $videoApi;
    }


    public function extraData($model)
    {
      
        return ['video_view' => $this->video_api->buildVideo(optional($model->video)->video_link)];
    }





    public function courses()
    {
        return  response()->json(Course::with('lessons')->get());
    }
}
