<?php

namespace App\Console;

use App\Simulator;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\GenerateEventMachine',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $simulator = Simulator::orderBy('id', 'desc')->first();
        $time = $simulator->minutes > 0 ? $simulator->minutes : 0;

//        dd($time);

        $schedule->command('machine:generate_event_machine')
             ->timezone('America/Sao_Paulo')
//             ->everyMinute()
             ->cron('*/'.$time.' * * * *')
             ;
                  //->everyMinute();
        //*/1 * * * * php ~/control-status/control-status-back/ && php artisan schedule:run >> /dev/null 2>&1
        //*/2 * * * * php ~/control-status/control-status-back/ && php artisan schedule:run >> /dev/null 2>&1
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
