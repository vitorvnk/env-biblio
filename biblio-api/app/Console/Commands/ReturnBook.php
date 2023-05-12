<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ReturnBook as Job ;

class ReturnBook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:return-book';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify customer of book return date';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Job::dispatch();
    }
}
