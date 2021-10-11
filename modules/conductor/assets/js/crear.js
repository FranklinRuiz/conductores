$("#modal-conductor").on("click", function () {
    $.post(APP_URL + '/conductor/default/get-modal', {}, function (resp) {
        bootbox.dialog({
            title: "<h2><strong>Registro conductor</strong></h2>",
            message: resp.plantilla,
            buttons: {}
        });

        $("#btn-cancelar").click(function () {
            bootbox.hideAll();
        });

        $("#persona").select2({
            placeholder: "Seleccione Persona"
        })

        $("#pais").select2({
            placeholder: "Seleccione Pais"
        })

        $(document).ready(function () {
            $("#btn-guardar").click(function () {
                $("#form-conductor").validate({
                    rules: {
                        persona: "required",
                        pais: "required",
                        fecha_emision_licencia_oficial: "required",
                        fecha_vencimiento_licencia_oficial: "required",
                        numero_licencia_oficial: "required",
                        fecha_emision_licencia_interna: "required",
                        fecha_vencimiento_licencia_interna: "required",
                        numero_licencia_interna: "required",
                        estado_conductor: "required",
                        estado_verificacion: "required",
                        tipo_licencia_oficial: "required",
                        tipo_licencia_interno: "required",
                    },
                    messages: {
                        persona: "Por favor ingrese datos",
                        pais: "Por favor ingrese datos",
                        fecha_emision_licencia_oficial: "Por favor ingrese datos",
                        fecha_vencimiento_licencia_oficial: "Por favor ingrese datos",
                        numero_licencia_oficial: "Por favor ingrese datos",
                        fecha_emision_licencia_interna: "Por favor ingrese datos",
                        fecha_vencimiento_licencia_interna: "Por favor ingrese datos",
                        numero_licencia_interna: "Por favor ingrese datos",
                        estado_conductor: "Por favor ingrese datos",
                        estado_verificacion: "Por favor ingrese datos",
                        tipo_licencia_oficial: "Por favor ingrese datos",
                        tipo_licencia_interno: "Por favor ingrese datos",
                    },
                    submitHandler: function () {
                        var persona = $("#persona").val();
                        var pais = $("#pais").val();
                        var fecha_emision_licencia_oficial = $("#fecha_emision_licencia_oficial").val();
                        var fecha_vencimiento_licencia_oficial = $("#fecha_vencimiento_licencia_oficial").val();
                        var numero_licencia_oficial = $("#numero_licencia_oficial").val();
                        var fecha_emision_licencia_interna = $("#fecha_emision_licencia_interna").val();
                        var fecha_vencimiento_licencia_interna = $("#fecha_vencimiento_licencia_interna").val();
                        var numero_licencia_interna = $("#numero_licencia_interna").val();
                        var estado_conductor = $("#estado_conductor").val();
                        var estado_verificacion = $("#estado_verificacion").val();
                        var tipo_licencia_oficial = $("#tipo_licencia_oficial").val();
                        var tipo_licencia_interno = $("#tipo_licencia_interno").val();
                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: APP_URL + '/conductor/default/create',
                            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            data: {
                                persona: persona,
                                pais: pais,
                                fecha_emision_licencia_oficial: fecha_emision_licencia_oficial,
                                fecha_vencimiento_licencia_oficial: fecha_vencimiento_licencia_oficial,
                                numero_licencia_oficial: numero_licencia_oficial,
                                fecha_emision_licencia_interna: fecha_emision_licencia_interna,
                                fecha_vencimiento_licencia_interna: fecha_vencimiento_licencia_interna,
                                numero_licencia_interna: numero_licencia_interna,
                                estado_conductor: estado_conductor,
                                estado_verificacion: estado_verificacion,
                                tipo_licencia_oficial: tipo_licencia_oficial,
                                tipo_licencia_interno: tipo_licencia_interno
                            },
                            success: function (response) {
                                bootbox.hideAll();
                                if (response) {
                                    notificacion('Accion realizada con exito', 'success');
                                } else {
                                    notificacion('Error al guardar datos', 'error');
                                }
                                datatableConductor.draw()
                            }
                        });
                    }
                });
            });
        });
    }, 'json');
});
