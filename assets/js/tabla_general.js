function iniciarTabla(id_tabla, url, id_buscar, columnas) {
    var data = $(id_tabla).DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: {
                url: APP_URL + url
            },
            columns: columnas
        })
    ;

    return data;
}
