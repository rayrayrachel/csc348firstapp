<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LikeNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $likeable;
    public $liker;

    /**
     * Create a new message instance.
     */
    public function __construct($likeable, $liker)
    {
        $this->likeable = $likeable;
        $this->liker = $liker;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'You Got a New Like!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.like-notification',
            with: [
                'likeable' => $this->likeable,
                'liker' => $this->liker,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
