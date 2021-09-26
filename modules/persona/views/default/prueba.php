<?php

use app\modules\persona\bundles\PersonaAsset;

$bundle = PersonaAsset::register($this);
?>


<!--begin::Datatable-->
<table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

        <th>Customer Name</th>
        <th>Email</th>
        <th>Company</th>
        <th>Payment Method</th>
        <th>Created Date</th>
        <th class="text-end min-w-100px">Actions</th>
    </tr>
    </thead>
    <tbody class="text-gray-600 fw-bold">
    </tbody>
</table>
<!--end::Datatable-->