function funcionFicha(id) {
    $.post(APP_URL + '/equipo/default/get-modal-ficha/' + id, {}, function (resp) {
        bootbox.dialog({
            title: "<h2><strong>Ficha Técnica</strong></h2>",
            message: resp.plantilla,
            buttons: {}
        });

        $("#btn-cancelar").click(function () {
            bootbox.hideAll();
        });

    }, 'json');
}
