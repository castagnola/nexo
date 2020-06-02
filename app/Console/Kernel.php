<?php

namespace Nexo\Console;

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
        \Nexo\Console\Commands\NexoPermissions::class,
        \Nexo\Console\Commands\SearchExpiredServices::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('nexo:search-expired-services')
            ->sendOutputTo('storage/logs/cron.log')
            ->everyTenMinutes();
    }
}
