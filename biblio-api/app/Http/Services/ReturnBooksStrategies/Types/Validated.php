<?php

namespace App\Http\Services\ReturnBooksStrategies\Types;

use App\Models\RendedBook;
use App\Mail\ValidatedBook;
use Illuminate\Support\Facades\Mail;

class Validated
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
        if (!empty($rendedBook->returned_at)){
            Mail::to($rendedBook->customer->email)->send(new ValidatedBook($rendedBook));
            return 'Email disparado.';
        }

        return !empty($this->next) ? $this->next->exec($rendedBook) : 'Não processado.';
    }
}
