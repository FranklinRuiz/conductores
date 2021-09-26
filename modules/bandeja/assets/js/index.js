"use strict";
var columnas = [
    {
        field: "categoria",
        title: "Categoria",
        width: 80
    },
    {
        field: "seccion",
        title: "Seccion"
    },
    {
        field: "equipo",
        title: "Equipo"
    },
    {
        field: "descripcion",
        title: "Descripción"
    },
    {
        field: "estado",
        title: "Estado"
    },
    {
        field: "tecnico",
        title: "Técnico"
    },
    {
        field: "accion",
        title: "Acciones",
        width: 100
    }
];

var datatableEncargaddo = iniciarTabla("#tabla-encargado", "/bandeja/default/lista", "#tabla-encargado-buscar", columnas);
