"use strict";
var columnas = [
    {
        field: "categoria",
        title: "Categoria",
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
        title: "Estado",
        width: 80
    },
    {
        field: "accion",
        title: "Acciones",
        width: 210
    }
];

var datatableTecnico = iniciarTabla("#tabla-tecnico", "/bandeja/tecnico/lista", "#tabla-tecnico-buscar", columnas);
