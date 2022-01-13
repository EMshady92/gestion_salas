<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SalasModel;
use DB;
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
         $sala->estado="ACTIVO";
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
         $lista->estado="ACTIVO";
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
          $lista->estado="INACTIVO";
          $lista->update();

          if($lista->update()){
            return $lista;
          }else{
           return false;
          }

    }
}
