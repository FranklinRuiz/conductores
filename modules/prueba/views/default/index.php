<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Lista de Personas Registradas </h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <button id="modal-persona" class="btn btn-primary font-weight-bolder">
                <i class="icon-2x text-white flaticon-avatar"></i>
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
                <div class="col-md-10">
                    <div class="input-icon">
                        <input type="text" class="form-control" placeholder="Buscar..." id="kt_datatable_search_query" />
                        <span>
                            <i class="flaticon2-search-1 text-muted"></i>
                        </span>
                    </div>
                </div>
                <div class="col-md-2">
                    <button style="width: 100%;" class="btn btn-light-primary px-6 font-weight-bold">Buscar</button>
                </div>
            </div>
        </div>
        <!--end::Search Form-->
        <!--end: Search Form-->
        <!--begin: Datatable-->
        <div class="datatable datatable-bordered datatable-head-custom" id="tabla-persona"></div>
        <!--end: Datatable-->
    </div>
</div>
<!--end::Card-->