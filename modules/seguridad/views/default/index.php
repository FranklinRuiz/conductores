<?php

use app\modules\seguridad\bundles\SeguridadAsset;

$bundle = SeguridadAsset::register($this);
?>
<div class="card card-custom gutter-b">
    <div class="card-body">
        <div class="example-preview">
            <ul class="nav nav-tabs nav-line-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#tab_usuario">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab_perfil">Perfiles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab_modulo">Modulos</a>
                </li>
            </ul>
            <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="tab_usuario" role="tabpanel">
                    <div class="row align-items-center pb-5">
                        <div class="col-md-9">
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
                                       id="tabla-usuario-buscar">
                            </div>
                            <!--end::Search Form-->

                        </div>
                        <div class="col-md-3 text-right">
                            <button id="modal-usuario" class="btn btn-primary">
                                <i class="bi bi-person-plus-fill fs-2"></i>
                                Registrar Usuario
                            </button>
                        </div>
                    </div>
                    <!--begin: Datatable-->
                    <table id="tabla-usuario" class="table align-middle table-row-dashed gy-5">
                        <thead>
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th>Usuario</th>
                            <th>Perfil</th>
                            <th>Area</th>
                            <th>Persona</th>
                            <th class="text-center min-w-100px">Acciones</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600"></tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
                <div class="tab-pane fade" id="tab_perfil" role="tabpanel">
                    <div class="row align-items-center pb-5">
                        <div class="col-md-9">
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
                                       id="tabla-perfil-buscar">
                            </div>
                            <!--end::Search Form-->
                        </div>
                        <div class="col-md-3 text-right">
                            <button id="modal-perfil" class="btn btn-primary">
                                <i class="bi bi-diagram-2-fill fs-2"></i>
                                Registrar Perfil
                            </button>
                        </div>
                    </div>
                    <!--begin: Datatable-->
                    <table id="tabla-perfil" class="table align-middle table-row-dashed gy-5">
                        <thead>
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th class="text-center min-w-100px">Acciones</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600"></tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
                <div class="tab-pane fade" id="tab_modulo" role="tabpanel">
                    <div class="row align-items-center pb-5">
                        <div class="col-md-9">
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
                                       id="tabla-modulo-buscar">
                            </div>
                            <!--end::Search Form-->
                        </div>
                        <div class="col-md-3 text-right">
                            <button id="modal-modulo" class="btn btn-primary">
                                <i class="bi bi-grid-fill fs-2"></i>
                                Registrar Módulo
                            </button>
                        </div>
                    </div>
                    <!--begin: Datatable-->
                    <table id="tabla-modulo" class="table align-middle table-row-dashed gy-5">
                        <thead>
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th>Nombre</th>
                            <th>Ruta</th>
                            <th class="text-center min-w-100px">Acciones</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600"></tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
    </div>
</div>