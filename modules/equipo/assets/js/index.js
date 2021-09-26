"use strict";
var columnas = [
    {
        field: "id",
        title: "Codigo",
         width: 60
    },
    {
        field: "tipo",
        title: "Tipo",
    },
    {
        field: "nombre_equipo",
        title: "Nombre"
    },
    {
        field: "descripcion",
        title: "Descripción"
    },
    {
        field: "accion",
        title: "Acciones",
        width: 300
    }
];

var datatable = iniciarTabla("#tabla-equipo", "/equipo/default/lista", "#tabla-equipo-buscar", columnas);
