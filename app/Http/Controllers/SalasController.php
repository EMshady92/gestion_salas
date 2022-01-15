<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SalasModel;
use DB;
use DateTime;
use Illuminate\Support\Facades\Redirect;
class SalasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = DB::table('salas')->get(); //traigo los registros de la tabla "salas" en la variable $salas

        return view('salas.index', ['salas' => $salas]); //retorno los registros de la tabla "salas" a la vista "index" de la carpeta "salas"
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salas.create'); //funcion que me muestra la vista create de salas
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $sala=new SalasModel;
         $sala->name=$request->get('nombre');
         $sala->estado="LIBRE";
         $sala->estado_sala="ACTIVO";
         $sala->save();

         if($sala->save()){
            return Redirect::to('/salas');
         }else{
            return false;
         }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sala=SalasModel::findOrFail($id);
        return view("salas.edit",["sala"=>$sala]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         $lista=SalasModel::findOrFail($id);
         $lista->name=$request->get('nombre');
         $lista->estado="LIBRE";
         $lista->estado_sala="ACTIVO";
         $lista->update();

         if($lista->update()){
             return Redirect::to('/salas');
         }else{
            return false;
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

          $lista=SalasModel::findOrFail($id);
          $lista->estado_sala="INACTIVO";
          $lista->update();

          if($lista->update()){
            return $lista;
          }else{
           return false;
          }

    }


    public function reservar_sala()
    {
        $salas = DB::table('salas')
        ->where('salas.estado_sala','=','ACTIVO') //cuando el estado sala es igual a ACITVO
        ->get(); //traigo los registros de la tabla "salas" en la variable $salas

        return view('salas.reserva_sala', ['salas' => $salas]); //retorno los registros de la tabla "salas" a la vista "reserva_sala" de la carpeta "salas"
    }

    public function checa_sala($id)
    {
        $sala_reg = DB::table('salas')
        ->where('salas.id','=',$id)
        ->first();

        if($sala_reg->estado == "RESERVADA"){
            $sala = 1;
            return response()->json(['sala'=>$sala,'sala_reg'=>$sala_reg]);
        }else if($sala_reg->estado == "LIBRE"){
            $sala = 2;
            return response()->json(['sala'=>$sala,'sala_reg'=>$sala_reg]);
        }
    }

    public function guardar_reserva($hora_inicio,$hora_fin,$id)
    {
         $sala=SalasModel::findOrFail($id);
         $sala->hora_inicio=$hora_inicio;
         $sala->hora_fin=$hora_fin;
         $sala->estado="RESERVADA";
         $sala->update();

         if($sala->update()){
            return response()->json(['sala'=>$sala]);
         }else{
            return false;
         }
    }

    public function valida_sala($id)
    {
        $sala_reg = DB::table('salas')
        ->where('salas.id','=',$id)
        ->first();

        if($sala_reg->estado == "RESERVADA"){

            $hora = new DateTime('now');
            $hora = $hora->format('H:i:s');

            if ($hora <= $sala_reg->hora_fin){
            $sala = 1;
            return response()->json(['sala'=>$sala,'sala_reg'=>$sala_reg]);
            }else{
                $sala = 3;
                return response()->json(['sala'=>$sala,'sala_reg'=>$sala_reg]);
            }

        }else if($sala_reg->estado == "LIBRE"){
            $sala = 2;
            return response()->json(['sala'=>$sala,'sala_reg'=>$sala_reg]);
        }
    }

    public function liberar_sala($id)
    {

            $sala=SalasModel::findOrFail($id);
            $sala->estado="LIBRE";
            $sala->hora_inicio="00:00:00";
            $sala->hora_fin="00:00:00";
            $sala->update();

            if($sala->update()){
               return response()->json(['sala'=>$sala]);
            }else{
               return false;
            }


    }

    public function libera_salas()
    {
            $salas = DB::table('salas')
            ->where('salas.estado','=','RESERVADA')
            ->get();
            $hora = new DateTime('now');
            $hora = $hora->format('H:i:s');
            foreach($salas as $sala){
               if($sala->hora_fin >= $hora){
                $sala=SalasModel::findOrFail($sala->id);
                $sala->estado="LIBRE";
                $sala->hora_inicio="00:00:00";
                $sala->hora_fin="00:00:00";
                $sala->update();

               /*  if($sala->update()){
                   return response()->json(['sala'=>$sala]);
                }else{
                   return false;
                } */

               }


            }





    }


}
