<form id="form-secciones">
    <div class="form-group">
        <label>Codigo<span class="text-danger">*</span></label>
        <input type="text" class="form-control" placeholder="Ingrese codigo" name="codigo" id="codigo" value="<?=$secciones->codigo_seccion?>"/>
    </div>
    <div class="form-group">
        <label>Nombre<span class="text-danger">*</span></label>
        <input type="text" class="form-control" placeholder="Ingrese nombre" name="nombre" id="nombre" value="<?=$secciones->nombre_seccion?>" />
    </div>
    <div class="form-group">
        <label>Area<span class="text-danger">*</span></label>
        <select class="form-control" id="id_area" name="id_area">
            <option selected value="" disabled>Seleccione opción</option>
            <?php foreach ($area as $a) { ?>
                <option value="<?= $a->id_area ?>" <?= $secciones->id_area == $a->id_area ? 'selected' : '' ?>>
                    <?= $a->codigo_area . '::' . $a->nombre_area ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <hr>
   
        <button class="btn btn-primary mr-2" id="btn-guardar">Actualizar</button>
        <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>
  
</form>
