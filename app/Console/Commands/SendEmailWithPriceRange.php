<?php

namespace App\Console\Commands;

use App\Mail\SendEmailWithGames;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailWithPriceRange extends Command
{

    protected $signature = 'app:send-email-with-price-range';


    protected $description = 'Enviar 10 jogos com valores entre R$20 e R$100.';


    public function handle()
    {
        $products = Product::query()
        ->inRandomOrder()
        ->take(10)
        ->whereBetween('price',  [20 , 100])
        ->get();

        Mail::to('thiago_barroso@estudante.sesisenai.org.br', 'Thiago Rios')
        ->send(new SendEmailWithGames($products));
    }
}
