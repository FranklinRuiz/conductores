<?php

use app\modules\preventivo\bundles\PreventivoAsset;

$bundle = PreventivoAsset::register($this);
?>
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Calendario Ordenes Trabajo</h3>
        </div>
        <div class="card-toolbar">
            <button id="generar" class="btn btn-light-primary font-weight-bold">
                <i class="ki ki-plus icon-md mr-2"></i>Generar
            </button>
        </div>
    </div>
    <div class="card-body">
        <div id="kt_calendar"></div>
    </div>
</div>
<!--end::Card-->