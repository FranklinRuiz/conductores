"use strict";
var columnas = [
    {
        data: "codigo_area"
    },
      {
        data: "nombre_area"
    },
      {
        data: "accion",
        width: 180
    }
];

var datatable = iniciarTabla("#tabla-area", "/area/default/lista", columnas);

$("#tabla-area-buscar").keyup(function (){
    datatable.search($(this).val()).draw();
})
