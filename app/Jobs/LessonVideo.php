<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\Course\Entities\Course;
use Modules\Course\Entities\CourseVideo;

class LessonVideo implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;
    /**
     * @var Course
     */
    private $course_video;

    /**
     * @var
     */
    private $video;

    /**
     * @param CourseVideo $course_video
     * @param $video
     */
    public function __construct(CourseVideo $course_video, $video)
    {
        $this->course_video = $course_video;
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $course_video = $this->course_video;
        $original_video = $this->video;

        $path = Storage::path($original_video);
        $course_video->addMedia($path)->usingFileName(Str::uuid().'.mp4')->toMediaCollection('media');

        Storage::delete($path);
        $course_video->loading_status = 'loaded';
        $course_video->save();
    }

    public function failed(\Exception $exception)
    {
        $this->course_video->loading_status = 'failed';
        $this->course_video->save();
    }
}
