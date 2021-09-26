$("#modal-area").on("click", function () {
    $.post(APP_URL + '/area/default/get-modal', {}, function (resp) {
        bootbox.dialog({
            title: "<h2><strong>Registro Area</strong></h2>",
            message: resp.plantilla,
            buttons: {}
        });

        $("#btn-cancelar").click(function () {
            bootbox.hideAll();
        });

        $(document).ready(function () {
            $("#btn-guardar").click(function () {
                $("#form-area").validate({
                    rules: {
                        codigo: "required",
                        nombre: "required",

                    },
                    messages: {
                        codigo: "Por favor ingrese datos",
                        nombre: "Por favor ingrese datos",
                    },
                    submitHandler: function () {
                        var codigo = $("#codigo").val();
                        var nombre = $("#nombre").val();

                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: APP_URL + '/area/default/create',
                            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            data: {
                                codigo_seccion: codigo,
                                nombre_seccion: nombre,
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
});
