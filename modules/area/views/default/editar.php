<form id="form-area">
    <div class="form-group">
        <label>Codigo<span class="text-danger">*</span></label>
        <input type="text" class="form-control" placeholder="Ingrese codigo" name="codigo" id="codigo" value="<?= $area->codigo_area?>"/>
    </div>
    <div class="form-group">
        <label>Nombre<span class="text-danger">*</span></label>
        <input type="text" class="form-control" placeholder="Ingrese nombre" name="nombre" id="nombre" value="<?= $area->nombre_area?>" />
    </div>
    <hr>

    <button class="btn btn-primary mr-2" id="btn-guardar">Actualizar</button>
    <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>

</form>
