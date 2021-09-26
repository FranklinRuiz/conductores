"use strict";
var columnas = [
    {
        field: "codigo_seccion",
        title: "Codigo"
    },
    {
        field: "nombre_seccion",
        title: "Secciones",
        width: 210
    },
      {
        field: "nombre_area",
        title: "Area",
        width: 210
    },
      {
        field: "accion",
        title: "Acciones",
        width: 210
    }
];

var datatable = iniciarTabla("#tabla-secciones", "/secciones/default/lista", "#tabla-secciones-buscar", columnas);
