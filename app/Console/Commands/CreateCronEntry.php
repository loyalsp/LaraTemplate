<?php

namespace App\Console\Commands;

use App\CronEntry;
use Illuminate\Console\Command;

class CreateCronEntry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:entry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will create an cron entry in cron entry table for testing';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $cron = new CronEntry();
        $cron->entry = 'cron entry';
        $cron->save();
    }
}
