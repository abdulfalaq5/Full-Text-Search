<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\ProdukModel;
use Log;

class SaveDataCustomerJobs implements ShouldQueue
{
    use Queueable;

    protected $dataProduk;

    /**
     * Create a new job instance.
     */
    public function __construct($dataProduk)
    {
        $this->dataProduk = $dataProduk;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $log = Log::channel("job");
        $log->info("Job Send Mail");
        try {
            $saveData = new ProdukModel;
            $saveData->name = $dataProduk['name'];
            $log->info("Cron succesfully send");
        } catch (\Throwable $th) {
            $log->error($th->getMessage());
            $log->info("Cront GAGAL send");
        }
    }
}
