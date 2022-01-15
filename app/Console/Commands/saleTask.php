<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SalasModel;
use DB;
use DateTime;
class saleTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sala:free';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
       /*  $salas = DB::table('salas')
        ->where('salas.estado','=','RESERVADA')
        ->get();
        $hora = new DateTime();
        $hora = $hora->format('H:i:s');
        foreach($salas as $sala){
           if($sala->hora_fin >= $hora){
            $sala=SalasModel::findOrFail($sala->id);
            $sala->estado="LIBRE";
            $sala->hora_inicio="00:00:00";
            $sala->hora_fin="00:00:00";
            $sala->update();
           }


        } */
    }
}
