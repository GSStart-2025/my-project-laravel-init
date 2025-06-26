<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LogEveryMinute extends Command
{
    protected $signature = 'log:minute';
    protected $description = 'Log a message every minute';

    public function handle(): void
    {
        Log::info('LogEveryMinute ran at ' . now());
    }
}
