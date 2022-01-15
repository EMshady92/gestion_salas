

//FUNCION PARA INACTIVAR REGISTROS// AUX ES LA RUTA QUE RECIBE
function inactivar(id, aux) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Se inactivará el registro",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, inactivar!'
    }).then((result) => {
        if (result.isConfirmed) {
            // var route = ruta_global + "/" + aux + "/" + id + "";
            var token = $("#token").val();
            $.ajax({
                url: "/" + aux + "/" + id + "",
                headers: { 'X-CSRF-TOKEN': token },
                type: 'post',
                method: 'DELETE',
                dataType: 'json',
                success: function () {
                    Swal.fire(
                        'Inactivado!',
                        'El registro se ha inactivado.',
                        'success'
                    )
                }
            });

            setTimeout(function () { location.reload() }, 1000);

            //location.reload();
        }
    })
}

function valida_hora(id) {
    var hora_inicio = document.getElementById('hora_inicio_'+id).value;
    var hora_fin = document.getElementById('hora_fin_'+id).value;

    separador_hora_inicio = hora_inicio.split(":");
    separador_hora_fin = hora_fin.split(":");
   var hora_inicio_cadena = separador_hora_inicio[0];
   var minutos_inicio_cadena = separador_hora_inicio[1];

   var hora_fin_cadena = separador_hora_fin[0];
   var minutos_fin_cadena = separador_hora_fin[1];

   var hora_inicio_entero = parseInt(hora_inicio_cadena);
   var hora_fin_entero = parseInt(hora_fin_cadena);
   var minutos_inicio_entero = parseInt(minutos_inicio_cadena);
   var minutos_fin_entero = parseInt(minutos_fin_cadena);

   var diferencia = Math.abs(hora_inicio_entero - hora_fin_entero);

     if (diferencia > 2){
         if(minutos_inicio_entero>minutos_fin_entero){
            Swal.fire(
                '¡Atencion!',
                'No se puede reservar una sala más de 2 horas',
                'warning'
            )
         }else{
            Swal.fire(
                '¡Atencion!',
                'No se puede reservar una sala más de 2 horas',
                'warning'
            )
         }

   }else{

   }
}



function reservar_sala(id) {
    var hora_inicio = document.getElementById('hora_inicio_'+id).value;
    var hora_fin = document.getElementById('hora_fin_'+id).value;
    var id_sala = document.getElementById('id_sala').value;
    $.ajax({
        type: "GET",
        method: 'get',
        url: "/guardar_reserva" +"/"+ hora_inicio +"/"+ hora_fin +"/"+ id,

        success: function (data) {

            Swal.fire(
                'Exito!',
                'Sala: '+data.sala.name +' registrada correctamente',
                'success'
            )


            $("#modalReservar_sala .close").click();
            $('.modalReservar_sala.in').modal('hide');
        setTimeout(function () { location.reload() }, 1000);

        }

    });
}

function valida_sala(id) {
    $.ajax({
        type: "GET",
        method: 'get',
        url: "/valida_sala" +"/"+ id,

        success: function (data) {
            var val = data.sala;
            if(val == 1){
                Swal.fire({
                    title: 'La hora final de reserva es '+ data.sala_reg.hora_fin +' ¿Liberar sala?',
                    text: "",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si'
                }).then((result) => {
                    if (result.isConfirmed) {
                        liberar_sala_manual(id);
                    } else {
                        return false;
                    }
                })

            }else if(val == 3){
                Swal.fire({
                    title: '¿Liberar sala?',
                    text: "",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si'
                }).then((result) => {
                    if (result.isConfirmed) {
                        liberar_sala_manual(id);
                    } else {
                        return false;
                    }
                })

            }else{
                Swal.fire(
                    'Atencion!',
                    'Sala: '+data.sala_reg.name +' esta libre',
                    'warning'
                )

            }
        }

    });
}

function checha_sala(id) {
    $.ajax({
        type: "GET",
        method: 'get',
        url: "/checa_sala" +"/"+ id,

        success: function (data) {
            var val = data.sala;

            if(val == 1){
                Swal.fire(
                    'Atencion!',
                    'Esta sala ya se encuentra reservada',
                    'warning'
                )
            }else{
                reservar_sala(id);
              //  setTimeout(function () { location.reload() }, 1000);
            }
        }

    });
}

function liberar_sala_manual(id) {
    $.ajax({
        type: "GET",
        method: 'get',
        url: "/liberar_sala" +"/"+ id,

        success: function (data) {
            var val = data.sala;

            if(val == 1){
                Swal.fire(
                    '¡Atención!',
                    'Esta sala ya se encuentra liberada',
                    'warning'
                )
            }else{
                Swal.fire(
                    'Exito!',
                    'Sala: '+data.sala.name +' liberada correctamente',
                    'success'
                )
                setTimeout(function () { location.reload() }, 1000);
            }
        }

    });
}



