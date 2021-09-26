function funcionEditar(id) {
    $.post(APP_URL + '/secciones/default/get-modal-edit/' + id, {}, function (resp) {
        bootbox.dialog({
            title: "<h2><strong>Editar Secciones</strong></h2>",
            message: resp.plantilla,
            buttons: {}
        });

        $("#btn-cancelar").click(function () {
            bootbox.hideAll();
        });

        $(document).ready(function () {
            $("#btn-guardar").click(function () {
                $("#form-secciones").validate({
                    rules: {
                        codigo: {
                            required: true,
                            number: true
                           },
                        nombre: "required",
                        id_area: "required",
                    },
                    messages: {
                         codigo: {
                            required: "Por favor ingrese Codigo",
                            number: "Por favor ingrese un número valido.",
                          
                        },
                        nombre: "Por favor ingrese dato",
                        id_area: "Seleccione una opcion",
                    },
                    submitHandler: function () {
                        var codigo = $("#codigo").val();
                        var nombre = $("#nombre").val();
                        var id_area = $("#id_area").val();

                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: APP_URL + '/secciones/default/update',
                            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            data: {
                                id_seccion: id,
                                codigo_seccion: codigo,
                                nombre_seccion: nombre,
                                id_area: id_area
                            },
                            success: function (response) {
                                bootbox.hideAll();
                                if (response) {
                                    notificacion('Accion realizada con exito', 'success');
                                } else {
                                    notificacion('Error al guardar datos', 'error');
                                }
                                datatable.reload()
                            }
                        });
                    }
                });
            });
        });
    }, 'json');
}
