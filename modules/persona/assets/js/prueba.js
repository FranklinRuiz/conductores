"use strict";

$("#kt_datatable_example_1").DataTable({
    responsive: true,
    searchDelay: 500,
    processing: true,
    serverSide: true,
    stateSave: true,
    ajax: {
        url: "https://preview.keenthemes.com/api/datatables.php",
    },
    columns: [
        { data: 'Name' },
        { data: 'Email' },
        { data: 'Company' },
        { data: 'CreditCardNumber' },
        { data: 'Datetime' },
        { data: null },
    ],
});