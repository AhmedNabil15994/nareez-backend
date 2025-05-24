<?php

namespace Modules\Course\Repositories\Dashboard;

use Illuminate\Http\Request;
use Modules\Course\Entities\Course;
use Modules\Course\Entities\CourseTarget;
use Modules\Course\Service\CourseService;
use Modules\Course\Service\CourseDateService;
use Modules\Course\Service\CourseTargetService;
use Modules\Core\Repositories\Dashboard\CrudRepository;

class CourseRepository extends CrudRepository
{
    public VideoRepository     $videoRepository;
    public CourseDateService   $courseDateService;
    public CourseTargetService $courseTargetService;
    public CourseService       $courseService;

    public function __construct()
    {
        parent::__construct(Course::class);
        $this->statusAttribute     = ['is_certificated', 'is_live','is_published'];
        $this->fileAttribute       = ['image' => 'image'];
        $this->videoRepository     = new VideoRepository();
        $this->courseDateService   = new CourseDateService();
        $this->courseTargetService = new CourseTargetService();
        $this->courseService       = new CourseService();
    }




    public function prepareData(array $data, Request $request, $is_create = true): array
    {
        if ($request->is_live) {
            $data['extra_attributes']['days'] = implode(',', $request['days_status']);
        }
        return $data;
    }



    public function modelCreated($model, $request, $is_created = true): void
    {
        $model->categories()->sync(int_to_array($request->category_id));
        $this->courseTargetService->handelTargets($model, $request);

        if ($model->is_live) {
            $this->courseService->handelCourseMeeting($model);
        }

        if ($request->intro_video) {

            $this->videoRepository->uploadVideo($model, $request, 'intro_video');
        }
    }

    public function modelUpdated($model, $request): void
    {
        $model->categories()->sync(int_to_array($request->category_id));
        if ($request->hasFile('intro_video')) {
            $this->videoRepository->updateVideo($model, $request, 'intro_video');
        }
        $this->courseTargetService->handelTargets($model, $request);

        if ($model->is_live) {
            $this->courseService->updateCourseMeeting($model);
        }
    }




    public function filterDataTable($query, $request)
    {

        $query = parent::filterDataTable($query, $request);
        $query->when(data_get($request, 'req.categories'), fn ($q) => $q
            ->categories((array)data_get($request, 'req.categories')))
            ->when(
                data_get($request, 'req.gender'),
                function ($q) use ($request) {
                    $q->whereJsonContains('extra_attributes->gender', data_get($request, 'req.gender'));
                }
            )
            ->when(
                data_get($request, 'req.trainer'),
                function ($q) use ($request) {
                    $q->trainer(data_get($request, 'req.trainer'));
                }
            );


        return $query;
    }
}
