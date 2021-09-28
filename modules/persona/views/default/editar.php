<form id="form-persona">
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">DNI</label>
        <input type="text" class="form-control" placeholder="Ingrese DNI" name="dni" id="dni" value="<?= $persona->dni ?>"/>
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Nombres</label>
        <input type="text" class="form-control" placeholder="Ingrese nombres" name="nombres" id="nombres" value="<?= $persona->nombres ?>"/>
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Apellido Paterno</label>
        <input type="text" class="form-control" placeholder="Ingrese apellido paterno" name="apellido_paterno" id="apellido_paterno" value="<?= $persona->apellido_paterno ?>"/>
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Apellido Materno</label>
        <input type="text" class="form-control" placeholder="Ingrese apellido materno" name="apellido_materno" id="apellido_materno" value="<?= $persona->apellido_materno ?>"/>
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Sexo</label>
        <select class="form-control" name="sexo" id="sexo">
            <option value="Masculino" <?= $persona->sexo == 'Masculino' ? 'selected' : '' ?>>Masculino</option>
            <option value="Femenino" <?= $persona->sexo == 'Femenino' ? 'selected' : '' ?>>Femenino</option>
        </select>
    </div>
    <hr>
    <button class="btn btn-primary mr-2" id="btn-guardar">Actualizar</button>
    <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>
</form>