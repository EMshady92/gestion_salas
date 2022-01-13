@extends('layout.principal')
@section('contenido')

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/tipos_promociones">Promociones</a></li>
                        <li class="breadcrumb-item active">Registro de Tipos de Promociones</li>
                    </ol>
                </div>
                <h4 class="page-title">Registrar nuevo tipo de Promoción</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->



    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <h4 class="header-title">Formulario de registro</h4>
                            <p class="sub-header">
                                Formulario para registrar nuevos Promociones.
                            </p>




                            <form action="{{route('salas.store')}}" method="post" id="formulario" class="form-horizontal parsley-examples">
                            {{csrf_field()}}






                                <div class="form-group" >
                                    <label for="AcuerdoName">Nombre<span class="text-danger">*</span></label>
                                    <input type="text" name="nombre"  parsley-trigger="change" required onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                                     placeholder="Ingrese el nombre de la nueva sala" class="form-control" id="nombre">
                                </div>







                                <div class="form-group text-right mb-0">
                                    <button class="btn btn-primary waves-effect waves-light mr-1" id="submit"  type="submit">
                                        Guardar
                                    </button>
                                    <button type="reset" onclick="location.href='/tipos_promociones'" class="btn btn-secondary waves-effect">
                                        Cancelar
                                    </button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
             </div>

        </div>
    </div> <!-- end row -->








</div> <!-- end container-fluid -->
            @stop
