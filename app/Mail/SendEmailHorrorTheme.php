<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailHorrorTheme extends Mailable
{
    use Queueable, SerializesModels;


    public $game;

    public function __construct($game)
    {
        $this->game = $game;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Jogos Terror',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'emails.SendGamesTerrorTemplate',
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
