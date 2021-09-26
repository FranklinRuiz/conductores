<form id="form-preventivo">
    <div class="form-group">
        <label>Equipo<span class="text-danger">*</span></label>
        <select class="form-control select2" id="equipo" name="equipo" style="width: 100%;" disabled>
            <option value="" selected disabled>Seleccione</option>
            <?php foreach ($equipo as $e) { ?>
                <option value="<?= $e->id_equipo ?>" <?= $preventivo->id_equipo == $e->id_equipo ? 'selected' : '' ?> ><?= $e->nombre_equipo ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Fecha<span class="text-danger">*</span></label>
        <input class="form-control" placeholder="Ingrese fecha" name="fecha" id="fecha" value="<?= $preventivo->fecha_mantenimiento ?>" disabled>
    </div>
    <div class="form-group">
        <label>Tecnico<span class="text-danger">*</span></label>
        <select class="form-control select2" id="tecnico" name="tecnico" style="width: 100%;">
            <option value="" selected disabled>Seleccione</option>
            <?php foreach ($tecnico as $t) { ?>
                <option value="<?= $t["id_usuario"] ?>" <?= $preventivo->id_usuario_asignado == $t["id_usuario"] ? 'selected' : '' ?>><?= $t["tecnico"] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Prioridad<span class="text-danger">*</span></label>
        <select class="form-control" id="prioridad" name="prioridad" style="width: 100%;">
            <option value="" selected disabled>Seleccione</option>
            <option value="BAJA" <?= $preventivo->prioridad == 'BAJA' ? 'selected' : '' ?> >BAJA</option>
            <option value="MEDIA" <?= $preventivo->prioridad == 'MEDIA' ? 'selected' : '' ?>>MEDIA</option>
            <option value="ALTA" <?= $preventivo->prioridad == 'ALTA' ? 'selected' : '' ?>>ALTA</option>
        </select>
    </div>
    <hr>
    <button class="btn btn-primary mr-2" id="btn-guardar">Guardar</button>
    <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>
</form>
