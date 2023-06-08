<?php

namespace App\Domain\Status\Commands;

use Illuminate\Console\Command;

class StatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks the status of the application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking status of the application...');

        $this->call(RedisStatusCommand::class);
        $this->call(MysqlStatusCommand::class);

        $this->info('Status check completed!');
    }
}
