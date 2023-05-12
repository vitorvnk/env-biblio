<?php

namespace App\Mail;

use App\Models\RendedBook;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class PendingBook extends Mailable
{
    use Queueable, SerializesModels;

    protected RendedBook $rendedBook;

    /**
     * Create a new message instance.
     */
    public function __construct(RendedBook $rendedBook = null)
    {
        $this->rendedBook = $rendedBook;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Devolução Pendente!'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'pending-book-notification',
            with: ['book' => $this->rendedBook->book]
        );
    }
}
