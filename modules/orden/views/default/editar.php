<form id="form-orden">
    <div class="form-group">
        <label>Categoria<span class="text-danger">*</span></label>
        <select class="form-control select2" id="categoria" name="categoria" style="width: 100%;">
            <option value="" selected disabled>Seleccione</option>
            <?php foreach ($categoria as $c): ?>
                <option value="<?= $c->id_categoria ?>" <?= $orden->id_categoria == $c->id_categoria ? 'selected' : '' ?>><?= $c->descripcion ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Seccion<span class="text-danger">*</span></label>
        <select class="form-control select2" id="seccion" name="seccion" style="width: 100%;">
            <option value="" selected disabled>Seleccione</option>
            <?php foreach ($seccion as $s): ?>
                <option value="<?= $s->id_seccion ?>" <?= $orden->id_seccion == $s->id_seccion ? 'selected' : '' ?>><?= $s->codigo_seccion . ' - ' . $s->nombre_seccion ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <input type="hidden" id="id_equipo" value="<?= $orden->id_equipo ?>">
        <label>Equipo<span class="text-danger">*</span></label>
        <select class="form-control select2" id="equipo" name="equipo" style="width: 100%;">
            <option value="" selected disabled>Seleccione</option>
        </select>
    </div>
    <div class="form-group">
        <label>Descripción<span class="text-danger">*</span></label>
        <textarea class="form-control" placeholder="Ingrese descripción" name="descripcion" id="descripcion"><?= $orden->descripcion ?></textarea>
    </div>
    <hr>
    <div class="text-right">
        <button class="btn btn-primary mr-2" id="btn-guardar">Guardar</button>
        <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>
    </div>
</form>
