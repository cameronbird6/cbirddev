<?php

namespace App\Domain\Status\Commands;

use App\Domain\Status\Services\MysqlCheckConnection;
use Illuminate\Console\Command;

class MysqlStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:mysql';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks the status of mysql';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {

        $online = app()->make(MySQLCheckConnection::class)->check();

        if ($online) {
            $this->info('MySQL is online!');
        } else {
            $this->error('MySQL is offline!');
        }

        return 0;
    }
}
