<?php

namespace App\Console;

use App\Console\Commands\SendBestGameRated;
use App\Console\Commands\SendEmailMarksWithMoreGames;
use App\Console\Commands\SendEmailWithGameOfTheDay;
use App\Console\Commands\SendEmailWithGamesToUsers;
use App\Console\Commands\SendEmailWithPriceRange;
use App\Console\Commands\SendHorrorThemedEmail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        SendEmailWithGamesToUsers::class,
        SendEmailWithPriceRange::class,
        SendBestGameRated::class,
        SendHorrorThemedEmail::class,
        SendEmailWithGameOfTheDay::class,
        SendEmailMarksWithMoreGames::class
    ];
    protected function schedule(Schedule $schedule): void
    {
        //$schedule->command('app:send-email-with-games-to-users')
        //->timezone('America/Sao_Paulo')
        //->at('08:00');

        //$schedule->command('app:send-email-with-price-range')
        //->timezone('America/Sao_Paulo')
        //->at('18:00');

        //$schedule->command('app:send-best-game-rated')
        //->timezone('America/Guayaquil')
       // ->at('20:00');

        //$schedule->command('app:send-horror-themed-email')
        //->timezone('America/Sao_Paulo')
        //->at('00:00');

        //$schedule->command('app:send-email-with-game-of-the-day')
        //->timezone('America/Sao_Paulo')
        //->at('12:00');

        $schedule->command('app:send-email-marks-with-more-games')
        ->timezone('America/Sao_Paulo')
        ->everyMinute();
    }


    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
