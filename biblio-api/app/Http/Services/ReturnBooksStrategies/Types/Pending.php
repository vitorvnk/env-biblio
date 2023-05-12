<?php

namespace App\Http\Services\ReturnBooksStrategies\Types;

use App\Mail\PendingBook;
use App\Models\RendedBook;
use Illuminate\Support\Facades\Mail;

class Pending
{
    /**
     * @var
     */
    protected mixed $next;

    /**
     * @var mixed $class
     * @return void
     */
    public function setNext( mixed $class ) : void
    {
        $this->next = $class;
    }

    public function exec( RendedBook $rendedBook ) : string
    {
        if (empty($rendedBook->returned_at)){
            Mail::to($rendedBook->customer->email)->send(new PendingBook($rendedBook));
            return 'Email disparado.';
        }

        return $this->next->exec($rendedBook);
    }
}
