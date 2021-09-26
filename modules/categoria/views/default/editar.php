<form id="form-categoria">
    <div class="form-group">
        <label>Descripción<span class="text-danger">*</span></label>
        <input type="text" class="form-control" placeholder="Ingrese descripción" name="descripcion" id="descripcion" value="<?= $categoria->descripcion ?>" />
    </div>
    <hr>
    <div class="text-right">
        <button class="btn btn-primary mr-2" id="btn-guardar">Actualizar</button>
        <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>
    </div>
</form>
