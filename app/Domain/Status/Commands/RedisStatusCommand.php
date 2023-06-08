<?php

namespace App\Domain\Status\Commands;

use App\Domain\Status\Services\RedisCheckConnection;
use Illuminate\Console\Command;

class RedisStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:redis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks the status of redis';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $online = app()->make(RedisCheckConnection::class)->check();

        if ($online) {
            $this->info('Redis is online!');
        } else {
            $this->error('Redis is offline!');
        }

        return 0;
    }
}
