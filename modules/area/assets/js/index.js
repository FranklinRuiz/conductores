"use strict";
var columnas = [
    {
        field: "codigo_area",
        title: "Codigo"
    },
      {
        field: "nombre_area",
        title: "Area",
    },
      {
        field: "accion",
        title: "Acciones",
        width: 210
    }
];

var datatable = iniciarTabla("#tabla-area", "/area/default/lista", "#tabla-area-buscar", columnas);
