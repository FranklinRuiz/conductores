<form id="form-encargado">
    <div class="form-group">
        <label>Técnico<span class="text-danger">*</span></label>
        <select class="form-control select2" name="tecnico" id="tecnico" style="width: 100%;">
            <?php foreach ($tecnicos as $t) { ?>
                <option value="<?= $t['id_usuario'] ?>"><?= $t['tecnico'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Cometario<span class="text-danger">*</span></label>
        <textarea type="text" class="form-control" placeholder="Ingrese Comentario" name="comentario" id="comentario"></textarea>
    </div>
    <hr>
    <button class="btn btn-primary mr-2" id="btn-guardar">Derivar</button>
    <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>
</form>