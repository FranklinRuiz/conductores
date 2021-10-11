<form id="form-conductor">
    <div class="row">
        <div class="col-md-6 mb-5">
            <label class="required fw-bold fs-6 mb-2">Persona</label>
            <select class="form-select" data-control="select2" data-dropdown-parent="#form-conductor" id="persona"
                    name="persona">
                <option value="" selected disabled>Seleccione</option>
                <?php foreach ($personas as $p): ?>
                    <option value="<?= $p->id_persona ?>" <?= $p->id_persona == $conductor->id_persona ? 'selected' : '' ?>>
                        <?= $p->nombres . ' ' . $p->apellido_paterno . ' ' . $p->apellido_materno ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6 mb-5">
            <label class="required fw-bold fs-6 mb-2">Pais</label>
            <select class="form-select" data-control="select2" data-dropdown-parent="#form-conductor" id="pais"
                    name="pais">
                <option value="" selected disabled>Seleccione</option>
                <?php foreach ($pais as $p): ?>
                    <option value="<?= $p->id_pais ?>" <?= $p->id_pais == $conductor->id_pais ? 'selected' : '' ?>>
                        <?= $p->nombre_pais ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-5">
            <label class="required fw-bold fs-6 mb-2">F. Emi. Licencia Oficial</label>
            <input type="date" class="form-control" name="fecha_emision_licencia_oficial"
                   id="fecha_emision_licencia_oficial" value="<?= $conductor->fecha_emision_licencia_oficial ?>"/>
        </div>
        <div class="col-md-6 mb-5">
            <label class="required fw-bold fs-6 mb-2">F. Ven. Licencia Oficial</label>
            <input type="date" class="form-control" name="fecha_vencimiento_licencia_oficial"
                   id="fecha_vencimiento_licencia_oficial"
                   value="<?= $conductor->fecha_vencimiento_licencia_oficial ?>"/>
        </div>
    </div>
    <div class="fv-row mb-5">
        <label class="required fw-bold fs-6 mb-2">Numero Licencia Oficial</label>
        <input type="text" class="form-control" placeholder="Ingrese Numero Licencia Oficial"
               name="numero_licencia_oficial" id="numero_licencia_oficial"
               value="<?= $conductor->numero_licencia_oficial ?>"/>
    </div>
    <div class="row">
        <div class="col-md-6 mb-5">
            <label class="required fw-bold fs-6 mb-2">F. Emi. Licencia Interna</label>
            <input type="date" class="form-control" name="fecha_emision_licencia_interna"
                   id="fecha_emision_licencia_interna" value="<?= $conductor->fecha_emision_licencia_interna ?>"/>
        </div>
        <div class="col-md-6 mb-5">
            <label class="required fw-bold fs-6 mb-2">F. Ven. Licencia Interna</label>
            <input type="date" class="form-control" name="fecha_vencimiento_licencia_interna"
                   id="fecha_vencimiento_licencia_interna"
                   value="<?= $conductor->fecha_vencimiento_licencia_interna ?>"/>
        </div>
    </div>
    <div class="fv-row mb-5">
        <label class="required fw-bold fs-6 mb-2">Numero Licencia Interna</label>
        <input type="text" class="form-control" placeholder="Ingrese Numero Licencia Interna"
               name="numero_licencia_interna" id="numero_licencia_interna"
               value="<?= $conductor->numero_licencia_interna ?>"/>
    </div>
    <div class="row">
        <div class="col-md-6 mb-5">
            <label class="required fw-bold fs-6 mb-2">Estado Conductor</label>
            <select class="form-select" data-control="select2" data-dropdown-parent="#form-conductor"
                    id="estado_conductor"
                    name="estado_conductor">
                <option value="" selected disabled>Seleccione</option>
                <?php foreach ($estadoConductor as $e): ?>
                    <option value="<?= $e->id_estado_conductor ?>" <?= $e->id_estado_conductor == $conductor->id_estado_conductor ? 'selected' : '' ?>>
                        <?= $e->nombre_estado ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6 mb-5">
            <label class="required fw-bold fs-6 mb-2">Estado Verificacion</label>
            <select class="form-select" data-control="select2" data-dropdown-parent="#form-conductor"
                    id="estado_verificacion"
                    name="estado_verificacion">
                <option value="" selected disabled>Seleccione</option>
                <?php foreach ($estadoVerificacion as $e): ?>
                    <option value="<?= $e->id_estado_verificacion ?>" <?= $e->id_estado_verificacion == $conductor->id_estado_verificacion ? 'selected' : '' ?>>
                        <?= $e->nombre_estado ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-5">
            <label class="required fw-bold fs-6 mb-2">Tipo Licencia Oficial</label>
            <select class="form-select" data-control="select2" data-dropdown-parent="#form-conductor"
                    id="tipo_licencia_oficial"
                    name="tipo_licencia_oficial">
                <option value="" selected disabled>Seleccione</option>
                <?php foreach ($tipoLicenciaOficial as $t): ?>
                    <option value="<?= $t->id_tipo_licencia_oficial ?>" <?= $t->id_tipo_licencia_oficial == $conductor->id_tipo_licencia_oficial ? 'selected' : '' ?>>
                        <?= $t->nombre_licencia ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6 mb-5">
            <label class="required fw-bold fs-6 mb-2">Tipo Licencia Interno</label>
            <select class="form-select" data-control="select2" data-dropdown-parent="#form-conductor"
                    id="tipo_licencia_interno"
                    name="tipo_licencia_interno">
                <option value="" selected disabled>Seleccione</option>
                <?php foreach ($tipoLicenciaInterno as $t): ?>
                    <option value="<?= $t->id_tipo_licencia_interna ?>" <?= $t->id_tipo_licencia_interna == $conductor->id_tipo_licencia_interna ? 'selected' : '' ?>>
                        <?= $t->nombre_licencia ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <hr>
    <div class="text-right">
        <button class="btn btn-primary mr-2" id="btn-guardar">Actualizar</button>
        <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>
    </div>
</form>
