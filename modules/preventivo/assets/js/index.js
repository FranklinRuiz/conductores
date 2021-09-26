var mes_actual = 0;
var fecha;
var e = moment().startOf("day"),
        t = e.format("YYYY-MM"),
        i = e.clone().subtract(1, "day").format("YYYY-MM-DD"),
        n = e.format("YYYY-MM-DD"),
        r = e.clone().add(1, "day").format("YYYY-MM-DD"),
        o = document.getElementById("kt_calendar");

getFechaActual();
listaOrden();

function listaOrden() {
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: APP_URL + '/preventivo/default/lista',
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: {
            mes: mes_actual
        },
        success: function (response) {
            if (response) {
                fecha = new FullCalendar.Calendar(o, {
                    plugins: ["bootstrap", "interaction", "dayGrid", "timeGrid", "list"],
                    themeSystem: "bootstrap",
                    isRTL: KTUtil.isRTL(),
                    locale: 'es',
                    header: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek,timeGridDay"
                    },
                    height: 800,
                    contentHeight: 780,
                    aspectRatio: 3,
                    nowIndicator: !0,
                    now: n + "T09:25:00",
                    views: {
                        dayGridMonth: {
                            buttonText: "Mes"
                        },
                        timeGridWeek: {buttonText: "Semana"},
                        timeGridDay: {buttonText: "Dia"}
                    },
                    defaultView: "dayGridMonth",
                    defaultDate: n,
                    editable: !0,
                    eventLimit: !0,
                    navLinks: !0,
                    events: response,
                    eventClick: function (e) {
                        console.log(e)
                        $.get(APP_URL + '/preventivo/default/get-modal/' + e.event.id, {}, function (resp) {
                            bootbox.dialog({
                                title: "<h2><strong>Asignar Orden</strong></h2>",
                                message: resp.plantilla,
                                buttons: {}
                            });

                            $("#btn-cancelar").click(function () {
                                bootbox.hideAll();
                            });

                            $("#equipo").select2({
                                placeholder: "Seleccione equipo"
                            })

                            $("#tecnico").select2({
                                placeholder: "Seleccione tecnico"
                            })

                            $(document).ready(function () {
                                $("#btn-guardar").click(function () {
                                    $("#form-preventivo").validate({
                                        rules: {
                                            tecnico: "required",
                                            prioridad: "required",
                                        },
                                        messages: {
                                            tecnico: "Por favor ingrese datos",
                                            prioridad: "Por favor ingrese datos",
                                        },
                                        submitHandler: function () {
                                            var tecnico = $("#tecnico").val();
                                            var prioridad = $("#prioridad").val();

                                            $.ajax({
                                                type: "POST",
                                                dataType: 'json',
                                                url: APP_URL + '/preventivo/default/actualizar',
                                                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                                                data: {
                                                    id_preventivo: +e.event.id,
                                                    tecnico: tecnico,
                                                    prioridad: prioridad,
                                                },
                                                success: function (response) {
                                                    bootbox.hideAll();
                                                    if (response) {
                                                        notificacion('Accion realizada con exito', 'success');
                                                    } else {
                                                        notificacion('Error al guardar datos', 'error');
                                                    }
                                                    listaOrden()
                                                }
                                            });
                                        }
                                    });
                                });
                            });
                        }, 'json');
                    },
                });
                fecha.render();
            }

        }
    });
}

function getFechaActual() {
    const fecha_actual = new Date();
    mes_actual = fecha_actual.getMonth() + 1
}

$("#generar").click(function () {
    let f = fecha.getDate()
    if ((f.getMonth() + 1) > mes_actual) {
        funcionGenerar()
    } else {
        Swal.fire("Mensaje!", "Solo se puede generar en un mes posterior.", "warning")
    }
});

function funcionGenerar() {
    Swal.fire({
        title: "¿Está seguro de generar las ordenes de trabajo?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, ¡generar!",
        cancelButtonText: "No, ¡cancelar!",
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: APP_URL + '/preventivo/default/generar',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    mes: mes_actual
                },
                success: function (response) {
                    if (response > 0) {
                        Swal.fire("Generado!", "Los registro fueron generados correctamente.", "success")
                    }
                    listaOrden()
                }
            });
        } else if (result.dismiss === "cancel") {
            Swal.fire("Cancelado", "No se realizo ninguna accion.", "error")
        }
    });
}