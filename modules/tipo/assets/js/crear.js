$("#modal-tipo").on("click", function () {
    $.post(APP_URL + '/tipo/default/get-modal', {}, function (resp) {
        bootbox.dialog({
            title: "<h2><strong>Registro Tipo</strong></h2>",
            message: resp.plantilla,
            buttons: {}
        });

        $("#btn-cancelar").click(function () {
            bootbox.hideAll();
        });

        $(document).ready(function () {
            $("#btn-guardar").click(function () {
                $("#form-tipo").validate({
                    rules: {
                        nombre: "required"
                    },
                    messages: {
                        nombre: "Por favor ingrese dato"
                    },
                    submitHandler: function () {
                        
                        var nombre = $("#nombre").val();
                       
                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: APP_URL + '/tipo/default/create',
                            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            data: {
                                nombre: nombre
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
