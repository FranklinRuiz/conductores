"use strict";
var columnas = [
    {data: "numero_licencia_oficial"},
    {data: "persona"},
    {data: "fecha_emision_licencia_oficial"},
    {data: "estado_conductor"},
    {data: "estado_verificacion"},
    {data: "tipo_licencia_oficial"},
    {data: "accion"}
];

var datatableConductor = iniciarTabla("#tabla-conductor", "/conductor/default/lista", columnas);

$("#tabla-conductor-buscar").keyup(function (){
    datatableConductor.search($(this).val()).draw();
})
