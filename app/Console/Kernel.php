<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\User;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
        $time = strtotime(date('Y-m-d'));
        $date = date("Y-m-d", strtotime("-1 month", $time));;
        
        $schedule->call(function () {
          $ordinaryUser =  User::whereDate('charged_at',$date)
                ->where('is_premium',0)
                ->get();
            foreach($ordinaryUser as $ou){
                if ($ou['balances']>20) {
                    $ou['balances'] = $ou['balances'] - 20;
                }else{
                    $ou['balances'] = 0;
                }
                $ou['charged_at'] = date("Y-m-d H:i:s");
                $ou->save();
            }

            $premiumUser =  User::whereDate('charged_at',$date)
                ->where('is_premium',1)
                ->get();
            foreach($premiumUser as $pu){
                if ($pu['balances']>40) {
                    $pu['balances'] = $pu['balances'] - 40;
                }else{
                    $pu['balances'] = 0;
                }
                $pu['charged_at'] = date("Y-m-d H:i:s");
                $pu->save();
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
