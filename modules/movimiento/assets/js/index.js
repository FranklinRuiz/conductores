"use strict";
var columnas = [
    {
        field: "equipo",
        title: "Equipo",
    },
    {
        field: "area",
        title: "Area"
    },
    {
        field: "seccion",
        title: "Seccion"
    },
    {
        field: "estado",
        title: "Estado"
    },
    {
        field: "accion",
        title: "Acciones",
        width: 210
    }
];

var datatable = iniciarTabla("#tabla-movimiento", "/movimiento/default/lista", "#tabla-movimiento-buscar", columnas);
