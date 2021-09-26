"use strict";
var columnas = [
    {
        field: "descripcion",
        title: "Categoria"
    },
    {
        field: "accion",
        title: "Acciones",
        width: 210
    }
];

var datatable = iniciarTabla("#tabla-categoria", "/categoria/default/lista", "#tabla-categoria-buscar", columnas);
