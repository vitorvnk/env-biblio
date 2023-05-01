<?php

namespace App\Observers;

use App\Models\Book;
use App\Jobs\NewBookNotification;

class BookObserver
{
    /**
     * Handle the Book "created" event.
     */
    public function created(Book $book): void
    {
        NewBookNotification::dispatchSync($book);
    }
}
