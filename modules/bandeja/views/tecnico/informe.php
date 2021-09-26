<form id="form-informe">
    <div class="form-group">
        <label>Descripción de Falla<span class="text-danger">*</span></label>
        <textarea type="text" class="form-control" placeholder="Ingrese descripción" name="descripcion" id="descripcion"></textarea>
    </div>
    <div class="form-group">
        <label>Diagnóstico<span class="text-danger">*</span></label>
        <textarea type="text" class="form-control" placeholder="Ingrese diagnóstico" name="diagnostico" id="diagnostico"></textarea>
    </div>
    <div class="form-group">
        <label>Recomendaciones<span class="text-danger">*</span></label>
        <textarea type="text" class="form-control" placeholder="Ingrese recomendaciones" name="recomendaciones" id="recomendaciones"></textarea>
    </div>
    <div class="form-group">
        <label>Adjuntar Archivo</label>
        <div class="pl-5 pr-5">
            <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2">
                <div class="dropzone-msg dz-message needsclick">
                    <h3 class="dropzone-msg-title">Suelta el archivos aquí o haz clic para subirlo.</h3>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="text-right">
        <button class="btn btn-primary mr-2" id="btn-guardar">Guardar</button>
        <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>
    </div>
</form>
