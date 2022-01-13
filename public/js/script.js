

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


//MODAL PARA GUARDAR LOS DATOS DE UN ABOGADO NUEVO EN LA VISTA DE NUEVOS INGRESOS
function modal_abogado() {
    var dataString = $('#formulario_abogado').serialize(); // carga todos
    $.ajax({
        type: "POST",
        method: 'post',
        url: "/abogadosCrear",
        data: dataString,
        success: function (data) {

            var x = $('#abogado');
            option = new Option(data.nombre + " " + data.apellido_paterno + " " + data.apellido_materno, data.id, true, true);
            x.append(option).trigger('change');
            x.trigger({
                type: 'select2:select',
                params: {
                    data: data
                }
            });
            $("#modal_abogado .close").click();
            $('.modal_abogado.in').modal('hide');
            setTimeout(function () { location.reload() }, 1000);

        }
    });
}



