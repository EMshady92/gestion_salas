<div class="modal fade" id="modalReservar_sala_{{$sala->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reservar sala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <input type="text" value="{{$sala->id}}" id="id_sala" name="id_sala" style="display:none">

                    <div class="form-group">
                        <label for="nombre">Nombre<span class="text-danger">*</span></label>
                        <input type="nombre" name="nombre"
                            value="{{$sala->name}}"
                            parsley-trigger="change"  placeholder="Ingresar el email" class="form-control"
                            id="nombre" disabled>
                    </div>

                    <div class="form-group">
                        <label for="hora_inicio">Hora inicio<span class="text-danger">*</span></label>
                        <input type="time" name="hora_inicio"  parsley-trigger="change"
                            placeholder="Ingresar el email" class="form-control" id="hora_inicio_{{$sala->id}}">

                    </div>

                    <div class="form-group">
                        <label for="hora_fin">Hora fin<span class="text-danger">*</span></label>
                        <input type="time" name="hora_fin" onchange="valida_hora({{$sala->id}})" parsley-trigger="change"
                            placeholder="Ingresar el email" class="form-control" id="hora_fin_{{$sala->id}}">

                    </div>

                    <div class="modal-footer">
                        <div class="form-group text-right mb-0">
                            <a onclick="checha_sala({{$sala->id}});" class="btn btn-primary waves-effect waves-light mr-1">
                                Reservar
                            </a>
                            <button data-dismiss="modal" class="btn btn-secondary waves-effect">
                                Cancelar
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
