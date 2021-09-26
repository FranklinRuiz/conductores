<?php

use app\modules\persona\bundles\PersonaAsset;

$bundle = PersonaAsset::register($this);
?>
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Lista de Personas Registradas </h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <button id="modal-persona" class="btn btn-primary">
                <i class="text-white flaticon-avatar"></i>
                Registrar Persona
            </button>
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <!--begin: Search Form-->
        <!--begin::Search Form-->
        <div class="mb-7">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="input-icon">
                        <input type="text" class="form-control" placeholder="Buscar..." id="tabla-persona-buscar"/>
                        <span>
                            <i class="flaticon2-search-1 text-muted"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Search Form-->
        <!--end: Search Form-->
        <!--begin: Datatable-->
        <!--        <div class="datatable datatable-bordered datatable-head-custom" id="tabla-persona"></div>-->


        <table id="tabla-persona" class="table align-middle table-row-dashed fs-6 gy-5">
            <thead>
            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                <th>DNI</th>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th class="text-end min-w-100px">Acciones</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 fw-bold">
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
<!--end::Card-->