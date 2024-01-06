<?php

namespace App\Console\Commands;

use App\Mail\SendEmailHorrorTheme;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendHorrorThemedEmail extends Command
{
    protected $signature = 'app:send-horror-themed-email';

    protected $description = 'Enviar e-mail com jogos do tema terror';

    public function handle()
    {
        $results = DB::select("
            SELECT p.id AS game_id, p.name, p.price, p.name, p.description
            FROM products p
            JOIN products_markers pm ON pm.product_id = p.id
            JOIN markers m ON m.id = pm.marker_id
            WHERE price BETWEEN 30 AND 300
            AND m.name = 'terror'
        ");
        
        if (count($results) > 0) {

            Log::info($results);


            Mail::to('thiago_barroso@estudante.sesisenai.org.br', 'Thiago Rios')
                ->send(new SendEmailHorrorTheme($results));
        }
    }

}
