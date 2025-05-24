<?php

namespace Modules\Course\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
use MacsiDigital\Zoom\Facades\Zoom;
use Modules\Course\Entities\CourseDate;
use Modules\Course\Traits\MeetingZoomTrait;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class GenerateMeetingsCommand extends Command
{
    use MeetingZoomTrait;
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'meeting:create-today';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command for Creating Todays meetings';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $coursesDates=CourseDate::whereHas(
            'course',
            fn ($q) => $q->withExtraAttributes('extra_attributes->end_date', '>=', now())
        )
        ->with('course:id,title')
        ->where(
            ['day'=> Carbon::today()->format('D')]
        )->chunk(200, function ($chunkedDates) {
            foreach ($chunkedDates as $key => $date) {
                $newMeeting= $this->handelDataForMeeting($date) ;
                $meeting = $this->createMeeting($newMeeting);
                $date->course->meetings()->create(['zoom_response'=>$meeting]);
            }
        });
    }


    public function handelDataForMeeting($date)
    {
        return   [
          'topic'      => $date->course->title,
          'start_time' => $this->zoomFormat($date->start_date),
          'duration'   => $date->duration*60,
        ];
    }
    public function zoomFormat($time)
    {
        return Carbon::parse($time)->format('Y-m-d h:i:s A') ;
    }
}
