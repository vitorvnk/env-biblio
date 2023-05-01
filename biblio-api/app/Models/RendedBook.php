<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RendedBook extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'rended_books';

    /**
     * @var array
     */
    protected $fillable = [
        'book_id',
        'returned_at',
        'customer_id'
    ];

    public function book() : BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function customer() : BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
