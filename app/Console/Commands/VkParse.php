<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class VkParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vk:parse {vk_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to start parsing market goods';

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
     * @return int
     */
    public function handle()
    {
        dd($this->argument('user'));
    }
}