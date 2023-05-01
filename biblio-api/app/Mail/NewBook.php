<?php

namespace App\Mail;

use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class NewBook extends Mailable
{
    use Queueable, SerializesModels;

    protected Book $book;

    /**
     * Create a new message instance.
     */
    public function __construct(Book $book = null)
    {
        $this->book = $book;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Novo Livro!'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'new-book-notification',
            with: ['book' => $this->book]
        );
    }
}
