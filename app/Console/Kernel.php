<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\SalasModel;
use DB;
use DateTime;
class Kernel extends ConsoleKernel
{
    protected $commands = [
        commands\saleTask::class
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('sala:free')->everyMinute();
         $schedule->call(function(){

            $salas = DB::table('salas')
            ->where('salas.estado','=','RESERVADA')
            ->get();
            $hora = new DateTime();
            $hora = $hora->format('H:i:s');
            foreach($salas as $sala){
               if($sala->hora_fin == $hora){
                $sala=SalasModel::findOrFail($sala->id);
                $sala->estado="LIBRE";
                $sala->hora_inicio="00:00:00";
                $sala->hora_fin="00:00:00";
                $sala->update();
               }


            }




         })->everyMinute();
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
