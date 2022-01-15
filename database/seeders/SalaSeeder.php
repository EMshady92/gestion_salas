<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use DateTime;
class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hora = new DateTime();
        $hora = $hora->format('Y-m-d H:i:s');
        DB::table('salas')->insert([
            'name' => 'SALA 1',
            'hora_inicio' => '00:00:00',
            'hora_fin' => '00:00:00',
            'estado' => 'LIBRE',
            'estado_sala' => 'ACTIVO',
            'created_at' => $hora,
            'updated_at' => $hora,
            ]);

        DB::table('salas')->insert([
            'name' => 'SALA 2',
            'hora_inicio' => '00:00:00',
            'hora_fin' => '00:00:00',
            'estado' => 'LIBRE',
            'estado_sala' => 'ACTIVO',
            'created_at' => $hora,
            'updated_at' => $hora,
                ]);

        DB::table('salas')->insert([
            'name' => 'SALA 3',
            'hora_inicio' => '00:00:00',
            'hora_fin' => '00:00:00',
            'estado' => 'LIBRE',
            'estado_sala' => 'ACTIVO',
            'created_at' => $hora,
            'updated_at' => $hora,
                ]);
    }
}
