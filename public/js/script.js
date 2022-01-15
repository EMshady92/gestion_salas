

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

        }
    })
}
//funcion valida hora
function valida_hora(id) {
    var hora_inicio = document.getElementById('hora_inicio_'+id).value; //obtengo y guardo en la variable hora_incio el valor del id "hora_inicio"
    var hora_fin = document.getElementById('hora_fin_'+id).value;  //obtengo y guardo en la variable hora_incio el valor del id "hora_fin"

    separador_hora_inicio = hora_inicio.split(":"); //separo la cadena obtenida de hora_inicio
    separador_hora_fin = hora_fin.split(":");  //separo la cadena obtenida de hora_fin
   var hora_inicio_cadena = separador_hora_inicio[0]; //guardo en hora_inicio_cadena el valor 0 de la cadena separada
   var minutos_inicio_cadena = separador_hora_inicio[1]; //guardo en minutos_inicio_cadena el valor 0 de la cadena separada

   var hora_fin_cadena = separador_hora_fin[0]; //guardo en hora_fin_cadena el valor 0 de la cadena separada
   var minutos_fin_cadena = separador_hora_fin[1]; //guardo en minutos_fin_cadena el valor 0 de la cadena separada

   var hora_inicio_entero = parseInt(hora_inicio_cadena); //convieerto a entero p
   var hora_fin_entero = parseInt(hora_fin_cadena); //convieerto a entero
   var minutos_inicio_entero = parseInt(minutos_inicio_cadena); //convieerto a entero
   var minutos_fin_entero = parseInt(minutos_fin_cadena); //convieerto a entero

   var diferencia = Math.abs(hora_inicio_entero - hora_fin_entero); //saco la diferencia entre hora_inico y hora_final

     if (diferencia > 2){ //si la diferencia es mayor que 2
         if(minutos_inicio_entero > minutos_fin_entero){ //si minutos_inicio_entero es mayor que minutos_fin_entero
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
    var hora_inicio = document.getElementById('hora_inicio_'+id).value; //obtengo y guardo en la variable hora_incio el valor del id "hora_inicio"
    var hora_fin = document.getElementById('hora_fin_'+id).value; //obtengo y guardo en la variable hora_incio el valor del id "hora_fin"
    $.ajax({ //inicio ajax
        type: "GET", //tipo get
        method: 'get', //metodo get
        url: "/guardar_reserva" +"/"+ hora_inicio +"/"+ hora_fin +"/"+ id, //declaro la ruta y los valores que mandara

        success: function (data) { //si la reserva fue exitosa
            //mensaje de confirmacion
            Swal.fire(
                'Exito!',
                'Sala: '+data.sala.name +' registrada correctamente',
                'success'
            )

        //cierro modal
            $("#modalReservar_sala .close").click();
            $('.modalReservar_sala.in').modal('hide');
        setTimeout(function () { location.reload() }, 1000); //recargo la view

        }

    });
}

function valida_sala(id) { //funcion para validar si una sala esta reservada
    $.ajax({ //inicio ajax
        type: "GET", //tipo get
        method: 'get', //metodo get
        url: "/valida_sala" +"/"+ id, //declaro la ruta y valor

        success: function (data) { //si resivo data de confirmacion de validacion
            var val = data.sala; //val igual a data.sala
            if(val == 1){ //si val es igual a 1
                Swal.fire({ //la sala esta reservada , muestra la hora_fin y pregunta si liberar sala reservada
                    title: 'La hora final de reserva es '+ data.sala_reg.hora_fin +' ¿Liberar sala?',
                    text: "",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si'
                }).then((result) => {
                    if (result.isConfirmed) {  //si la eleccion fue SI
                        liberar_sala_manual(id); //mando llamar la funcion liberar_sala_manual y mando id de la sala a liberar
                    } else { //si fue NO
                        return false; //retono false
                    }
                })

            }else if(val == 3){ //si valor igual a 3
                Swal.fire({  //mensaje de confirmacion si liberar sala en caso de que la hora de inicio haya superado la hora final
                    title: '¿Liberar sala?',
                    text: "",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si'
                }).then((result) => {
                    if (result.isConfirmed) { //si la respueusta fue SI
                        liberar_sala_manual(id); //mando llamar la funcion liberar_sala_manual y mando id de la sala a liberar
                    } else { //si fue NO
                        return false; //retono false
                    }
                })

            }else{ //de lo contrario
                Swal.fire( //la sala ya se encuentra en esrtalo LIBRE
                    'Atencion!',
                    'Sala: '+data.sala_reg.name +' esta libre',
                    'warning'
                )

            }
        }

    });
}

function checha_sala(id) { //funcion para evitar que una sala reservada pueda ser reservada si no ha sido liberada
    $.ajax({ //inicio ajax
        type: "GET", //tipo get
        method: 'get', //metodo get
        url: "/checa_sala" +"/"+ id, //declaro ruta

        success: function (data) { //si regreso datos en data
            var val = data.sala; //val es igual a data.sala

            if(val == 1){ //si val es igual a 1
                Swal.fire( //avisa sala reservada
                    'Atencion!',
                    'Esta sala ya se encuentra reservada',
                    'warning'
                )
            }else{ //de lo contrario
                reservar_sala(id); //manda a llamar funcion reservar_sala y mando id de sala a reservar
              //  setTimeout(function () { location.reload() }, 1000);
            }
        }

    });
}

function liberar_sala_manual(id) { //liberar sala de forma manual
    $.ajax({ //inicio ajax
        type: "GET", //tipo get
        method: 'get', //metodo get
        url: "/liberar_sala" +"/"+ id, //delcaro url

        success: function (data) { //si resibo datos de confirmacion de liberacion
            var val = data.sala; //val igul a data.sala

            if(val == 1){ //si val es igual a 1
                Swal.fire( //la sala ya esta en estado LIBRE
                    '¡Atención!',
                    'Esta sala ya se encuentra liberada',
                    'warning'
                )
            }else{ //de lo contrario
                Swal.fire( //mensaje de confirmacion de sala LIBERADA
                    'Exito!',
                    'Sala: '+data.sala.name +' liberada correctamente',
                    'success'
                )
                setTimeout(function () { location.reload() }, 1000); //recargo vista
            }
        }

    });
}



