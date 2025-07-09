<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Schedule::command('notify:maintenance-today')->dailyAt('07:00');
Schedule::command('notify:maintenance-today')->everyMinute();

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote');
