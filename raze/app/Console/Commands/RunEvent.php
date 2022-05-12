<?php

namespace App\Console\Commands;

use App\Events\TranslationEvent;
use Illuminate\Console\Command;

class RunEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Channel:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        TranslationEvent::dispatch();
        return 0;
    }
}
