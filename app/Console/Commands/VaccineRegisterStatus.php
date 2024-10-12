<?php

namespace App\Console\Commands;

use App\Services\GlobalService;
use Illuminate\Console\Command;


class VaccineRegisterStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:vaccinestatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        (new GlobalService)->updateStatusWhenScheduledDateExpired();
    }
}
