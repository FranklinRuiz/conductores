$("#modal-equipo").on("click", function () {
    $.post(APP_URL + '/equipo/default/get-modal', {}, function (resp) {
        bootbox.dialog({
            title: "<h2><strong>Registro Equipo</strong></h2>",
            message: resp.plantilla,
            buttons: {}
        });

        $("#tipo").select2({
            placeholder: "Seleccione Tipo"
        })

        $("#btn-cancelar").click(function () {
            bootbox.hideAll();
        });

        $(document).ready(function () {
            $("#btn-guardar").click(function () {
                $("#form-equipo").validate({
                    rules: {
                        tipo: "required",
                        nombre: "required",
                        descripcion: "required",
                        fabricante: "required",
                        fecha_fabricacion: "required",
                        marca: "required",
                        modelo: "required",
                        serie: "required",
                        vida_util: "required",
                        fecha_activacion: "required",
                    },
                    messages: {
                        tipo: "Por favor seleccione",
                        nombre: "Por favor ingrese dato",
                        descripcion: "Por favor ingrese dato",
                        fabricante: "Por favor ingrese dato",
                        fecha_fabricacion: "Por favor ingrese dato",
                        marca: "Por favor ingrese dato",
                        modelo: "Por favor ingrese dato",
                        serie: "Por favor ingrese dato",
                        vida_util: "Por favor ingrese dato",
                        fecha_activacion: "Por favor ingrese dato",
                    },
                    submitHandler: function () {
                        var tipo = $("#tipo").val();
                        var nombre = $("#nombre").val();
                        var descripcion = $("#descripcion").val();
                        var fabricante = $("#fabricante").val();
                        var fecha_fabricacion = $("#fecha_fabricacion").val();
                        var marca = $("#marca").val();
                        var modelo = $("#modelo").val();
                        var serie = $("#serie").val();
                        var vida_util = $("#vida_util").val();
                        var fecha_activacion = $("#fecha_activacion").val();
                        
                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            url: APP_URL + '/equipo/default/create',
                            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                            data: {
                                tipo: tipo,
                                nombre: nombre,
                                descripcion: descripcion,
                                fabricante: fabricante,
                                fecha_fabricacion: fecha_fabricacion,
                                marca: marca,
                                modelo: modelo,
                                serie: serie,
                                vida_util: vida_util,
                                fecha_activacion: fecha_activacion
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
