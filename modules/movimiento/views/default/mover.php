<form id="form-movimiento">
    <div class="form-group">
        <label>Equipo</label>
        <input class="form-control" value="<?= $equipo->nombre_equipo ?>" readonly>
    </div>
    <div class="form-group">
        <label>Area<span class="text-danger">*</span></label>
        <select class="form-control select2" id="area" name="area" style="width: 100%;">
            <option value="" selected disabled>Seleccione</option>
            <?php foreach ($area as $a): ?>
                <option value="<?= $a->id_area ?>"><?= $a->codigo_area . ' - ' . $a->nombre_area ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Seccion<span class="text-danger">*</span></label>
        <select class="form-control select2" id="seccion" name="seccion" style="width: 100%;">
            <option value="" selected disabled>Seleccione</option>
        </select>
    </div>
    <div class="form-group">
        <label>Estado<span class="text-danger">*</span></label>
        <select class="form-control select2" id="estado" name="estado" style="width: 100%;">
            <option value="" selected disabled>Seleccione</option>
            <?php foreach ($estado as $e): ?>
                <option value="<?= $e->id_estado_equipo ?>"><?= $e->descripcion ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <hr>
    <div class="text-right">
        <button class="btn btn-primary mr-2" id="btn-guardar">Guardar</button>
        <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>
    </div>
</form>
