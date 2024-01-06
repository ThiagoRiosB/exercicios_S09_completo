<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailMarksGames extends Mailable
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
            subject: 'Marcadores com mais jogos',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'emails.SendMarksWithMoreFamesTemplate',
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
