<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use MyApp\Websocket as MyAppWebsocket;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

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
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new \App\Helpers\Websocket()
                )
            ),
            8080
        );

        $server->run();
    }
}
