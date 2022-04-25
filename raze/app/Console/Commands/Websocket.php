<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Websocket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'websocket:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Команда для запуска сервера';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info(string:'Все работает');
    }
}
