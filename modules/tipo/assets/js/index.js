"use strict";
var columnas = [
    {
        field: "nombre",
        title: "Tipo"
    },
    {
        field: "accion",
        title: "Acciones",
        width: 210
    }
];

var datatable = iniciarTabla("#tabla-tipo", "/tipo/default/lista", "#tabla-tipo-buscar", columnas);
