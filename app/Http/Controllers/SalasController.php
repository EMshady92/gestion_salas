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

         $sala=new SalasModel; //nuevo modelo
         $sala->name=$request->get('nombre'); //name toma el valor de "nombre"
         $sala->estado="LIBRE"; //estado toma el valor de "libre"
         $sala->estado_sala="ACTIVO"; //estado_sala toma el valor de "activo"
         $sala->save(); //guarado nuevo registro

         if($sala->save()){ //si se guardo con exito
            return Redirect::to('/salas'); //redirecciona a /salas
         }else{ //de lo contrario
            return false; //retona falso
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
        $sala=SalasModel::findOrFail($id); //busco en el modelo el registro con el id correspondiente
        return view("salas.edit",["sala"=>$sala]); //mando $salas a la vista salas.edit
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

         $sala=SalasModel::findOrFail($id); //busco en el modelo el registro con el id correspondiente
         $sala->name=$request->get('nombre'); //name toma el valor de "nombre"
         $sala->estado="LIBRE";   //estado toma el valor de "libre"
         $sala->estado_sala="ACTIVO"; //estado_sala toma el valor de "activo"
         $sala->update(); //actualizo registro

         if($sala->update()){ //si se actualizo
             return Redirect::to('/salas'); //redirecciono a /salas
         }else{ //de lo contrario
            return false; //retono false
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

          $lista=SalasModel::findOrFail($id); //busco en el modelo el registro con el id correspondiente
          $lista->estado_sala="INACTIVO"; //estado_sala toma el valor de "INACTIVO"
          $lista->update(); //actualizo registro

          if($lista->update()){  //si se actualizo
            return $lista; //retorno a el registro actualizado
          }else{  //de lo contrario
           return false; //retono false
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
        ->first(); //traigo el registro de la db de datos correspondiene al id que recibo y lo guardo en la variable  $sala_reg

        if($sala_reg->estado == "RESERVADA"){ // si el estado de el registro encontrado en $sala_reg es igual a RESERVADA
            $sala = 1; //$sala es igual a 1
            return response()->json(['sala'=>$sala,'sala_reg'=>$sala_reg]); //lo convierto en json y retorno $sala_reg y $sala
        }else if($sala_reg->estado == "LIBRE"){ //si el estado es igual a LIBRE
            $sala = 2; //$sala es igual a 2
            return response()->json(['sala'=>$sala,'sala_reg'=>$sala_reg]); //lo convierto en json y retorno $sala_reg y $sala
        }
    }

    public function guardar_reserva($hora_inicio,$hora_fin,$id)
    {
         $sala=SalasModel::findOrFail($id);  //busco en el modelo el registro con el id correspondiente
         $sala->hora_inicio=$hora_inicio; //hora_inicio toma el valor de "$hora_inicio"
         $sala->hora_fin=$hora_fin;//hora_fin toma el valor de "$hora_fin"
         $sala->estado="RESERVADA";//estado toma el valor de "RESERVADA"
         $sala->update(); //actualizo registro

         if($sala->update()){ //si se actualizo con exito
            return response()->json(['sala'=>$sala]); //retono el registro actualizado en formato json
         }else{  //de lo contrario
            return false; //retorno false
         }
    }

    public function valida_sala($id)
    {
        $sala_reg = DB::table('salas')
        ->where('salas.id','=',$id)
        ->first(); //traigo el registro de la db de datos correspondiene al id que recibo y lo guardo en la variable  $sala_reg

        if($sala_reg->estado == "RESERVADA"){ //si $sala_reg->estado es igual a RESERVADA

            $hora = new DateTime('now'); //obtengo fecha y hora actual
            $hora = $hora->format('H:i:s'); //le doy formato de hora

            if ($hora <= $sala_reg->hora_fin){ //si la hora es menor o igual a $sala_reg->hora_fin
            $sala = 1; //$sala es igual a 1
            return response()->json(['sala'=>$sala,'sala_reg'=>$sala_reg]); //convierto $sala y $sala_reg a json y lo retorno
            }else{ //de lo contrario
                $sala = 3; //$sala es igual a 3
                return response()->json(['sala'=>$sala,'sala_reg'=>$sala_reg]); //convierto $sala y $sala_reg a json y lo retorno
            }

        }else if($sala_reg->estado == "LIBRE"){ //si $sala_reg->estado es igual a LIBRE
            $sala = 2; //$sala es igual a 2
            return response()->json(['sala'=>$sala,'sala_reg'=>$sala_reg]); //convierto $sala y $sala_reg a json y lo retorno
        }
    }

    public function liberar_sala($id)
    {

            $sala=SalasModel::findOrFail($id);  //busco en el modelo el registro con el id correspondiente
            $sala->estado="LIBRE"; //estado es igual a LIBRE
            $sala->hora_inicio="00:00:00"; //hora_inicio toma el valor 00:00:00 formato de hora en ceros
            $sala->hora_fin="00:00:00"; //hora_fin toma el valor 00:00:00 formato de hora en ceros
            $sala->update(); //actualizo registro

            if($sala->update()){ //si se actualizo el registro
               return response()->json(['sala'=>$sala]); //retorno el registro en formato json
            }else{ //de lo contrario
               return false; //retono false
            }


    }
}
