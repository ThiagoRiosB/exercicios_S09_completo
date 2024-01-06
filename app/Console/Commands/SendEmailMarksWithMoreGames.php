<?php

namespace App\Console\Commands;

use App\Mail\SendEmailMarksGames;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailMarksWithMoreGames extends Command
{

    protected $signature = 'app:send-email-marks-with-more-games';


    protected $description = 'Command description';


    public function handle()
    {
        $topMarkerIds = DB::table('products_markers')
        ->select('marker_id', DB::raw('COUNT(*) as marker_count'))
        ->groupBy('marker_id')
        ->orderByDesc('marker_count')
        ->limit(20)
        ->pluck('marker_id')
        ->toArray();

        $result = DB::table('markers')
        ->whereIn('id', $topMarkerIds)
        ->get();


    if (count($result) > 0) {

        Log::info($result);


        Mail::to('thiago_barroso@estudante.sesisenai.org.br', 'Thiago Rios')
            ->send(new SendEmailMarksGames($result));
    }
    }
}
