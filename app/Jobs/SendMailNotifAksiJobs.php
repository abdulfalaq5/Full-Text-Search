<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Log;

class SendMailNotifAksiJobs implements ShouldQueue
{
    use Queueable;

    protected $dataMail;

    /**
     * Create a new job instance.
     */
    public function __construct($dataMail)
    {
        $this->dataMail = $dataMail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $log = Log::channel("job");
        $log->info("Job Send Mail");
        try {
            $user_email = $this->dataMail['alamat_email'];
            $dataMail = $this->dataMail;
            $result = Mail::send('emails.send_mail', $dataMail, function ($message) use ($user_email) {
    
                $message->subject('CONTOH SEND MAIL');
    
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME', 'Example'));
              
                $message->to($user_email);
                
            });
            $log->info("Cron succesfully send");
        } catch (\Throwable $th) {
            $log->error($th->getMessage());
            $log->info("Cront GAGAL send");
        }
    }
}
