<?php

namespace Modules\Course\Repositories\Dashboard;

use DB;
use Hash;
use Modules\Course\Entities\Lesson;
use Modules\Course\Entities\CourseLesson;
use Modules\Core\Traits\Attachment\Attachment;
use Modules\Core\Traits\RepositorySetterAndGetter;
use Modules\Core\Repositories\Dashboard\CrudRepository;

class LessonRepository extends CrudRepository
{
    public function __construct()
    {
        parent::__construct(Lesson::class);
        $this->fileAttribute = ['image' => 'image'];
    }

    public function getModel()
    {
       
        return $this->model
            ->when(
                request('course_id'),
                fn ($q) =>  $q->whereCourseId(request('course_id'))
            );
    }
}
