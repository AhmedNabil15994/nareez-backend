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

class CourseIntro implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;
    /**
     * @var Course
     */
    private $course;

    /**
     * @var
     */
    private $video;

    /**
     * @param Course $course
     * @param $video
     */
    public function __construct(Course $course, $video)
    {
        $this->course = $course;
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $course = $this->course;
        $original_video = $this->video;

        $path = Storage::path($original_video);
        $course->addMedia($path)->usingFileName(Str::uuid().'.mp4')->toMediaCollection('intro', 'public');

        Storage::delete($path);
        $course->intro_video_status = 'loaded';
        $course->save();
    }

    public function failed(\Exception $exception)
    {
        $this->course->intro_video_status = 'failed';
        $this->course->save();
    }
}
