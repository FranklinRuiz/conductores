function funcionDerivar(id) {
    $.post(APP_URL + '/bandeja/default/get-modal-derivar/' + id, {}, function (resp) {
        bootbox.dialog({
            title: "<h2><strong>Derivar Orden Trabajo</strong></h2>",
            message: resp.plantilla,
            buttons: {}
        });

        $("#btn-cancelar").click(function () {
            bootbox.hideAll();
        });

        $("#tecnico").select2({
            placeholder: "Seleccioné Técnico"
        });

        $(document).ready(function () {
            $("#btn-guardar").click(function () {
                $("#form-encargado").validate({
                    rules: {
                        tecnico: "required",
                        comentario: "required",
                    },
                    messages: {
                        tecnico: "Por favor seleccione",
                        comentario: "Por favor ingrese datos",
                    },
                    submitHandler: function () {
                        var tecnico = $("#tecnico").val();
                        var comentario = $("#comentario").val();

                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: APP_URL + '/bandeja/default/derivar',
                            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            data: {
                                id_orden: id,
                                tecnico: tecnico,
                                comentario: comentario,
                            },
                            success: function (response) {
                                bootbox.hideAll();
                                if (response) {
                                    notificacion('Accion realizada con exito', 'success');
                                } else {
                                    notificacion('Error al guardar datos', 'error');
                                }
                                datatableEncargaddo.reload()
                            }
                        });
                    }
                });
            });
        });
    }, 'json');
}
