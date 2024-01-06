<?php

namespace App\Console\Commands;

use App\Mail\SendEmailWithGames;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailWithGameOfTheDay extends Command
{

    protected $signature = 'app:send-email-with-game-of-the-day';


    protected $description = 'Enviar e-mail com um jogo aleatório';


    public function handle()
    {
        $products = Product::query()
        ->inRandomOrder()
        ->take(1)
        ->get();

        Mail::to('thiago_barroso@estudante.sesisenai.org.br', 'Thiago Rios')
        ->send(new SendEmailWithGames($products));
    }
}
