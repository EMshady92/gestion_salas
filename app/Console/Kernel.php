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

         $schedule->call(function(){ // callback para actualizar sala automaticamente cada minuto

            $salas = DB::table('salas') //guardo en la variable $salas los registros de la tabla 'salas' en estado RESERVADA
            ->where('salas.estado','=','RESERVADA')
            ->get();
            $hora = new DateTime(); //obtengo fecha y hora
            $hora = $hora->format('H:i:s'); //formateo fecha en formato hora
            foreach($salas as $sala){ //foreach para actualizar salas con hora_Fin cumplida
               if($sala->hora_fin == $hora){ //si hora fin es igual o mayor a hora actual
                $sala=SalasModel::findOrFail($sala->id); //obtengo el registro por medio del modelo y el id
                $sala->estado="LIBRE"; //estado igual a LIBRE
                $sala->hora_inicio="00:00:00"; //hora inicio en ceros
                $sala->hora_fin="00:00:00"; //hora final en ceros
                $sala->update(); //actualizo registro
               }


            }
         })->everyMinute(); //cada minuto
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
