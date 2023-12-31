<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'todo:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Base installation';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->call('migrate');
        $this->call('queue:listen');

        return self::SUCCESS;
    }
}
