<?php

use app\bundles\TemplateAsset;

$bundle = TemplateAsset::register($this);
?>
<!--begin::Main-->
<div class="d-flex flex-column flex-root" style="height: 60rem;">
    <!--begin::Error-->
    <div class="error error-5 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url(<?php echo $bundle->baseUrl ?>/media/bg/bg-5.jpg);">
        <!--begin::Content-->
        <div class="container d-flex flex-row-fluid flex-column justify-content-md-center p-12">
            <h1 class="error-title font-weight-boldest text-info mt-10 mt-md-0 mb-12" style="font-size: 10rem !important;">Bienvenido!</h1>
            <p class="font-weight-boldest display-4">Sistema de mantenimiento de equipos médicos</p>
            <p class="font-size-h3" style="color: #1E1E2D;">Contiene módulos para mejorar los tiempos de atención y gestión para el mantenimiento de equipos médicos del hospital.</p>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Error-->
</div>
<!--end::Main-->