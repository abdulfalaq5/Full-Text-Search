<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendMailNotifAksiJobs;

class HitSenMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:hit-sen-mail-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'untuk manual hit job send mail';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dataMail = [
            'nama' => 'martin',
            'alamat_email' => 'martin12@gmail.com'
        ];

        $job = (new SendMailNotifAksiJobs($dataMail))->onQueue('sending_email');
        dispatch($job);
    }
}
