$("#modal-categoria").on("click", function () {
    $.post(APP_URL + '/categoria/default/get-modal', {}, function (resp) {
        bootbox.dialog({
            title: "<h2><strong>Registro Categoria</strong></h2>",
            message: resp.plantilla,
            buttons: {}
        });

        $("#btn-cancelar").click(function () {
            bootbox.hideAll();
        });

        $(document).ready(function () {
            $("#btn-guardar").click(function () {
                $("#form-categoria").validate({
                    rules: {
                        descripcion: "required",
                    },
                    messages: {
                        descripcion: "Por favor ingrese dato",
                    },
                    submitHandler: function () {
                        var descripcion = $("#descripcion").val();
                        
                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: APP_URL + '/categoria/default/create',
                            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            data: {
                                descripcion: descripcion,
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
