<?php

namespace App\Http\Services\ReturnBooksStrategies;

use App\Models\RendedBook;
use App\Http\Services\ReturnBooksStrategies\Types\Pending;
use App\Http\Services\ReturnBooksStrategies\Types\Validated;

class Kernel
{
    /**
     * @var RendedBook
     */
    protected RendedBook $rendedBook;

    /**
     * The Kernel construct
     * @param RendedBook $rendedBook
     */
    public function __construct(RendedBook $rendedBook)
    {
        $this->rendedBook = $rendedBook;
    }

    /**
     * @return string
     */
    public function handle(): string
    {
        $pending = new Pending();
        $validated = new Validated();

        $pending->setNext($validated);

        return $pending->exec($this->rendedBook);
    }
}
