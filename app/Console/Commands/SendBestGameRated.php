<?php

namespace App\Console\Commands;

use App\Mail\SendBestGameEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendBestGameRated extends Command
{

    protected $signature = 'app:send-best-game-rated';


    protected $description = 'Envia um e-mail com o jogo mais bem avaliado';


    public function handle()
    {
        $result =  DB::select('
       select
       count(product_id) as count_avaliation,
       a.product_id,
       p.name as game,
       p.price as price,
       p.description as description ,
       p.cover as cover
       from avaliations a
           join products p on p.id = a.product_id
               where a.recommended = true
               group by
                   product_id,
                   p.name,
                   p.price,
                   p.description,
                   p.cover
               order by count_avaliation desc
               limit 1
            ');

            Log::info($result);

    if (count($result) > 0) {
        Mail::to('thiago_barroso@estudante.sesisenai.org.br', 'Thiago Rios')
        ->send(new SendBestGameEmail($result[0]));
    }
    }
}
