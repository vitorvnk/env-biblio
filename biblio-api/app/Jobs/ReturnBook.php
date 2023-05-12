<?php

namespace App\Jobs;

use App\Models\RendedBook;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Services\ReturnBooksStrategies\Kernel;

class ReturnBook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(){}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $rendedBooks = RendedBook::where([
            ['return_limit_at', '>', now()->setHour(0)->setSecond(0)],
            ['return_limit_at', '<', now()->setHour(23)->setSecond(59)]
        ])->get();

        foreach ($rendedBooks as $rended){
            $response = (new Kernel($rended))->handle();
            Log::debug($response);
        }
    }
}
