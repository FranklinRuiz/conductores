"use strict";
var columnasPerfil = [
    {
        data: "nombre"
    },
    {
        data: "descripcion"
    },
    {
        data: "estado"
    },
    {
        data: "accion",
        width: 180
    }
];

var datatablePerfil = iniciarTabla("#tabla-perfil", "/seguridad/perfil/lista",  columnasPerfil);

$("#tabla-perfil-buscar").keyup(function (){
    datatablePerfil.search($(this).val()).draw();
})

$("#modal-perfil").on("click", function () {
    $.post(APP_URL + '/seguridad/perfil/get-modal', {}, function (resp) {
        bootbox.dialog({
            title: "<h2><strong>Registro Perfil</strong></h2>",
            message: resp.plantilla,
            buttons: {}
        });

        $("#btn-cancelar").click(function () {
            bootbox.hideAll();
        });

        $(document).ready(function () {
            $("#btn-guardar").click(function () {

                $("#form-perfil").validate({
                    rules: {
                        nombre: "required",
                        descripcion: "required",
                    },
                    messages: {
                        nombre: "Por favor ingrese datos",
                        descripcion: "Por favor ingrese datos",
                    },
                    submitHandler: function () {
                        var nombre = $("#nombre").val();
                        var descripcion = $("#descripcion").val();
                        var modulo = $('[name="modulo[]"]:checked').map(function () {
                            return this.value;
                        }).get();

                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: APP_URL + '/seguridad/perfil/create',
                            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            data: {
                                nombre: nombre,
                                descripcion: descripcion,
                                modulo: modulo
                            },
                            success: function (response) {
                                bootbox.hideAll();
                                if (response) {
                                    notificacion('Accion realizada con exito', 'success');
                                } else {
                                    notificacion('Error al guardar datos', 'error');
                                }
                                datatablePerfil.draw()
                            }
                        });
                    }
                });
            });
        });
    }, 'json');
});

function funcionEditarPerfil(id) {
    $.post(APP_URL + '/seguridad/perfil/get-modal-edit/' + id, {}, function (resp) {
        bootbox.dialog({
            title: "<h2><strong>Editar Perfil</strong></h2>",
            message: resp.plantilla,
            buttons: {}
        });

        $("#btn-cancelar").click(function () {
            bootbox.hideAll();
        });

        $(document).ready(function () {
            $("#btn-guardar").click(function () {
                $("#form-perfil").validate({
                    rules: {
                        nombre: "required",
                        descripcion: "required",
                    },
                    messages: {
                        nombre: "Por favor ingrese datos",
                        descripcion: "Por favor ingrese datos",
                    },
                    submitHandler: function () {
                        var nombre = $("#nombre").val();
                        var descripcion = $("#descripcion").val();
                        var modulo = $('[name="modulo[]"]:checked').map(function () {
                            return this.value;
                        }).get();

                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: APP_URL + '/seguridad/perfil/update',
                            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            data: {
                                id_perfil: id,
                                nombre: nombre,
                                descripcion: descripcion,
                                modulo: modulo
                            },
                            success: function (response) {
                                bootbox.hideAll();
                                if (response) {
                                    notificacion('Accion realizada con exito', 'success');
                                } else {
                                    notificacion('Error al guardar datos', 'error');
                                }
                                datatablePerfil.draw()
                            }
                        });
                    }
                });
            });
        });
    }, 'json');
}

function funcionEliminarPerfil(id) {
    Swal.fire({
        title: "??Est?? seguro?",
        text: "??No podr??s revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "S??, ??b??rralo!",
        cancelButtonText: "No, ??cancelar!",
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: APP_URL + '/seguridad/perfil/delete',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    id_perfil: id
                },
                success: function (response) {
                    if (response > 0) {
                        Swal.fire("Eliminado!", "El registro fue eliminado correctamente.", "success")
                    }
                    datatablePerfil.draw()
                }
            });
        } else if (result.dismiss === "cancel") {
            Swal.fire("Cancelado", "Tu registro est?? seguro.", "error")
        }
    });
}

function funcionEstadoPerfil(id, estado) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: APP_URL + '/seguridad/perfil/estado',
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            id_perfil: id,
            estado: estado
        },
        success: function (response) {
            if (response > 0) {
                Swal.fire("Actualizado!", "El registro fue cambiado correctamente.", "success")
            }
            datatablePerfil.draw()
        }
    });

}