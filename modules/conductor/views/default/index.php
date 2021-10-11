<?php

use app\modules\conductor\bundles\ConductorAsset;

$bundle = ConductorAsset::register($this);
?>
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Lista de Conductores Registrados </h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <button id="modal-conductor" class="btn btn-primary">
                <i class="bi bi-truck fs-2x"></i>
                Registrar conductor
            </button>
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <!--begin::Search Form-->
        <div class="d-flex align-items-center position-relative my-1">
            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
            <span class="svg-icon svg-icon-1 position-absolute ms-6">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                                  height="2" rx="1"
                                                                  transform="rotate(45 17.0365 15.1223)"
                                                                  fill="black"></rect>
															<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                                  fill="black"></path>
														</svg>
            </span>
            <!--end::Svg Icon-->
            <input type="text" class="form-control form-control-solid ps-15" placeholder="Buscar..."
                   id="tabla-conductor-buscar">
        </div>
        <!--end::Search Form-->

        <!--begin: Datatable-->
        <table id="tabla-conductor" class="table align-middle table-row-dashed gy-5">
            <thead>
            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                <th>N° Lic. Oficial</th>
                <th>Conductor</th>
                <th>F. Emision Licencia</th>
                <th>Estado</th>
                <th>Verificación</th>
                <th>Tipo</th>
                <th class="text-end min-w-100px">Acciones</th>
            </tr>
            </thead>
            <tbody class="text-gray-600"></tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
<!--end::Card-->