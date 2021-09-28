<form id="form-area">
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Codigo</label>
        <input type="text" class="form-control" placeholder="Ingrese codigo" name="codigo" id="codigo" value="<?= $area->codigo_area?>"/>
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Nombre</label>
        <input type="text" class="form-control" placeholder="Ingrese nombre" name="nombre" id="nombre" value="<?= $area->nombre_area?>" />
    </div>
    <hr>

    <button class="btn btn-primary mr-2" id="btn-guardar">Actualizar</button>
    <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>

</form>
