<?php

namespace App\Console;

use Modules\Core\Console\SearchTrans;
use Modules\Apps\Console\AppSetupCommand;
use Illuminate\Console\Scheduling\Schedule;
use Modules\Course\Console\CoursePeriodEmails;
use Modules\Course\Console\GenerateMeetingsCommand;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        AppSetupCommand::class,
        CoursePeriodEmails::class,
        GenerateMeetingsCommand::class,
        SearchTrans::class,
    ];



    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->command('backup:clean')->daily()->at('01:00');
        $schedule->command('backup:run')->daily()->at('02:00');
        $schedule->command('course:period-emails')->daily()->at('02:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
