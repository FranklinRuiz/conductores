<form id="form-modulo">
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Nombre Módulo</label>
        <input type="text" class="form-control" placeholder="Ingrese nombre del módulo" name="nombre" id="nombre" value="<?= $modulo->nombre_opcion ?>"/>
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Ruta</label>
        <input type="text" class="form-control" placeholder="Ingrese ruta" name="ruta" id="ruta" value="<?= $modulo->url ?>"/>
    </div>
    <hr>
    <button class="btn btn-primary mr-2" id="btn-guardar">Actualizar</button>
    <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>
</form>