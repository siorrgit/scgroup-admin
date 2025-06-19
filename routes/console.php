<?php

use Illuminate\Console\Scheduling\Schedule;

Schedule::command('backup:clean')->daily()->at('00:00');
    // ->onSuccess(function () {
    //     \Log::info('Backup clean completed successfully.');
    // })
    // ->onFailure(function () {
    //     \Log::error('Backup clean failed.');
    // });
Schedule::command('backup:run --only-db')->daily()->at('00:30');
    // ->onSuccess(function () {
    //     \Log::info('Backup completed successfully.');
    // })
    // ->onFailure(function () {
    //     \Log::error('Backup failed.');
    // });
