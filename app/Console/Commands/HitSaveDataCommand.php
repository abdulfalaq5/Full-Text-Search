<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SaveDataCustomerJobs;

class HitSaveDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:hit-save-data-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'untuk manual hit job save data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataJobs = [
            'name' => 'baju'
        ];

        $job = (new SaveDataCustomerJobs($dataJobs))->onQueue('save_data');
        dispatch($job);
    }
}
