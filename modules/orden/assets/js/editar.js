function funcionEditar(id) {
    $.post(APP_URL + '/orden/default/get-modal-edit/' + id, {}, function (resp) {
        bootbox.dialog({
            title: "<h2><strong>Editar Orden</strong></h2>",
            message: resp.plantilla,
            buttons: {}
        });

        $("#btn-cancelar").click(function () {
            bootbox.hideAll();
        });

        $("#categoria").select2({
            placeholder: "Seleccione Categoria"
        })

        $("#seccion").select2({
            placeholder: "Seleccione Seccion"
        })

        $("#equipo").select2({
            placeholder: "Seleccione Seccion"
        })

        $("#seccion").change(function () {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: APP_URL + '/orden/default/get-equipo',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    id: $(this).val()
                },
                success: function (response) {
                    $("#equipo").html(response);
                }
            });
        });

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: APP_URL + '/orden/default/get-equipo',
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: {
                id: $("#seccion").val()
            },
            success: function (response) {
                $("#equipo").html(response);
                $("#equipo option[value='" + $("#id_equipo").val() + "']").attr("selected", true);
            }
        });

        $(document).ready(function () {
            $("#btn-guardar").click(function () {
                $("#form-orden").validate({
                    rules: {
                        categoria: "required",
                        seccion: "required",
                        equipo: "required",
                        descripcion: "required",
                    },
                    messages: {
                        categoria: "Por favor seleccione",
                        seccion: "Por favor seleccione",
                        equipo: "Por favor seleccione",
                        descripcion: "Por favor ingrese dato",
                    },
                    submitHandler: function () {
                        var categoria = $("#categoria").val();
                        var seccion = $("#seccion").val();
                        var equipo = $("#equipo").val();
                        var descripcion = $("#descripcion").val();

                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: APP_URL + '/orden/default/update',
                            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            data: {
                                id_orden: id,
                                categoria: categoria,
                                seccion: seccion,
                                equipo: equipo,
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
}
