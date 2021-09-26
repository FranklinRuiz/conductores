"use strict";
var columnas = [
    {data: "dni"},
    {data: "nombres"},
    {data: "apellido_paterno"},
    {data: "apellido_materno"},
    {data: "accion"}
];

var datatable = iniciarTabla("#tabla-persona", "/persona/default/lista", "#tabla-persona-buscar", columnas);
