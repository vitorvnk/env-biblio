<?php

namespace App\Jobs;

use App\Models\Book;
use App\Mail\NewBook;
use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewBookNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Book $books;

    /**
     * Create a new job instance.
     */
    public function __construct(Book $books)
    {
        $this->books = $books;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $customers = Customer::all();
        foreach ($customers as $customer) {
            Mail::to($customer->email)->send(new NewBook($this->books));
        }
    }
}
