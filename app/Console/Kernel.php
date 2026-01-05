<?php

namespace App\Console;

use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            Admin::where('last_seen_at', '<', now()->subMinutes(5))
                ->update(['is_online' => false]);
                Customer::where('last_seen_at', '<', now()->subMinutes(5))
                ->update(['is_online' => false]);
        })->everyMinute();
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
