function funcionMover(id) {
    $.post(APP_URL + '/movimiento/default/get-modal-mover/' + id, {}, function (resp) {
        bootbox.dialog({
            title: "<h2><strong>Registro Movimiento</strong></h2>",
            message: resp.plantilla,
            buttons: {}
        });

        $("#area").select2({
            placeholder: "Seleccione Area"
        })

        $("#seccion").select2({
            placeholder: "Seleccione Seccion"
        })

        $("#estado").select2({
            placeholder: "Seleccione Estado"
        })

        $("#area").change(function () {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: APP_URL + '/movimiento/default/get-seccion',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    id: $(this).val()
                },
                success: function (response) {
                    $("#seccion").html(response);
                }
            });
        });


        $("#btn-cancelar").click(function () {
            bootbox.hideAll();
        });

        $(document).ready(function () {
            $("#btn-guardar").click(function () {
                $("#form-movimiento").validate({
                    rules: {
                        area: "required",
                        seccion: "required",
                        estado: "required",
                    },
                    messages: {
                        area: "Por favor seleccione",
                        seccion: "Por favor seleccione",
                        estado: "Por favor seleccione",
                    },
                    submitHandler: function () {
                        var seccion = $("#seccion").val();
                        var estado = $("#estado").val();

                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: APP_URL + '/movimiento/default/update',
                            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            data: {
                                id_movimiento: id,
                                seccion: seccion,
                                estado: estado,
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
