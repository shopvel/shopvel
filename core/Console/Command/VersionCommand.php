<?php
namespace Shopvel\Console\Command;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class VersionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shopvel:version';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get current version number';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Current version: ' . SHOPVEL_VERSION);
    }
}