function funcionInforme(id) {
    $.post(APP_URL + '/listapreventivo/default/get-modal-informe/', {}, function (resp) {
        bootbox.dialog({
            title: "<h2><strong>Informe Técnico</strong></h2>",
            message: resp.plantilla,
            buttons: {}
        });

        $("#btn-cancelar").click(function () {
            bootbox.hideAll();
        });

        var id_archivo;

        $("#kt_dropzone_2").dropzone({
            url: APP_URL + "/listapreventivo/default/upload",
            paramName: "file",
            maxFiles: 1,
            maxFilesize: 100,
            addRemoveLinks: !0,
            success: function (file, response) {
                id_archivo = response
            }
        })

        $(document).ready(function () {
            $("#btn-guardar").click(function () {
                $("#form-informe").validate({
                    rules: {
                        descripcion: "required",
                        diagnostico: "required",
                    },
                    messages: {
                        descripcion: "Por favor ingrese dato",
                        diagnostico: "Por favor ingrese dato",
                    },
                    submitHandler: function () {
                        var descripcion = $("#descripcion").val();
                        var diagnostico = $("#diagnostico").val();

                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: APP_URL + '/listapreventivo/default/informe',
                            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            data: {
                                id_preventivo: id,
                                descripcion: descripcion,
                                diagnostico: diagnostico,
                                id_archivo: id_archivo
                            },
                            success: function (response) {
                                bootbox.hideAll();
                                if (response) {
                                    notificacion('Accion realizada con exito', 'success');
                                } else {
                                    notificacion('Error al guardar datos', 'error');
                                }
                                datatablePreventivo.reload()
                            }
                        });
                    }
                });
            });
        });

    }, 'json');
}
