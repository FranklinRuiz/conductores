"use strict";
var columnas = [
    {
        field: "equipo",
        title: "Equipo",
    },
    {
        field: "fecha_mantenimiento",
        title: "Fecha",
         width: 75
    },
    {
        field: "prioridad",
        title: "Prioridad",
        width: 75
    },
    {
        field: "fecha_termino",
        title: "Ejecucion",
         width: 80
    },
    {
        field: "estado",
        title: "Estado",
        width: 95
    },
    {
        field: "descripcion_trabajo",
        title: "Descripcion",
    },
    {
        field: "accion",
        title: "Acciones",
        width: 210
    }
];

var datatablePreventivo = iniciarTabla("#tabla-preventivo", "/listapreventivo/default/lista", "#tabla-preventivo-buscar", columnas);
