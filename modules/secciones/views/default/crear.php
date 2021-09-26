<form id="form-secciones">
    <div class="form-group">
        <label>Codigo<span class="text-danger">*</span></label>
        <input type="text" class="form-control" placeholder="Ingrese codigo" name="codigo" id="codigo" />
    </div>
    <div class="form-group">
        <label>Nombre<span class="text-danger">*</span></label>
        <input type="text" class="form-control" placeholder="Ingrese nombre" name="nombre" id="nombre" />
    </div>
    <div class="form-group">
        <label>Area<span class="text-danger">*</span></label>
        <select class="form-control" id="id_area" name="id_area">
            <option selected value="" disabled>Seleccione opción</option>
            <?php foreach ($area as $a) { ?>
                <option value="<?= $a->id_area ?>"><?= $a->codigo_area . '::' . $a->nombre_area ?></option>
            <?php } ?>
        </select>
    </div>
    <hr>
    <div class="text-right">
        <button class="btn btn-primary mr-2" id="btn-guardar">Guardar</button>
        <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>
    </div>
</form>
