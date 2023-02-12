<?php

namespace App\Console\Commands;

use Faker\Factory;
use Illuminate\Console\Command;

class testLiveCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:testLive';

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
        $faker = Factory::create('pt_BR');

        dd($faker->name());
    }
}