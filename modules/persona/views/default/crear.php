<form id="form-persona">
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">DNI</label>
        <input type="text" class="form-control" placeholder="Ingrese DNI" name="dni" id="dni"/>
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Nombres</label>
        <input type="text" class="form-control" placeholder="Ingrese nombres" name="nombres" id="nombres" />
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Apellido Paterno</label>
        <input type="text" class="form-control" placeholder="Ingrese apellido paterno" name="apellido_paterno" id="apellido_paterno"/>
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Apellido Materno</label>
        <input type="text" class="form-control" placeholder="Ingrese apellido materno" name="apellido_materno" id="apellido_materno"/>
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Sexo</label>
        <select class="form-control" name="sexo" id="sexo">
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>
    </div>
    <hr>
    <button class="btn btn-primary mr-2" id="btn-guardar">Guardar</button>
    <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>
</form>
