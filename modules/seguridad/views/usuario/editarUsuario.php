<form id="form-usuario">
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Persona</label>
        <select class="form-select" data-control="select2" data-dropdown-parent="#form-usuario" id="persona" name="persona" style="width: 100%;">
            <?php foreach ($persona as $p): ?>
                <option value="<?= $p->id_persona ?>" <?= $usuario->id_persona == $p->id_persona ? 'selected' : '' ?>>
                    <?= $p->nombres . ' ' . $p->apellido_paterno . ' ' . $p->apellido_materno ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Area</label>
        <select class="form-select" data-control="select2" data-dropdown-parent="#form-usuario" id="area" name="area" style="width: 100%;">
            <?php foreach ($area as $a): ?>
                <option value="<?= $a->id_area ?>" <?= $usuario->id_area == $a->id_area ? 'selected' : '' ?>>
                    <?= $a->codigo_area . ' - ' . $a->nombre_area ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Perfil</label>
        <select class="form-select" data-control="select2" data-dropdown-parent="#form-usuario" id="perfil" name="perfil" style="width: 100%;">
            <?php foreach ($perfil as $p): ?>
                <option value="<?= $p->id_perfil ?>" <?= $usuario->id_perfil == $p->id_perfil ? 'selected' : '' ?>>
                    <?= $p->nombre_perfil ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Correo</label>
        <input type="text" class="form-control" placeholder="Ingrese correo" name="correo" id="correo" value="<?= $usuario->correo ?>"/>
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Usuario</label>
        <input type="text" class="form-control" placeholder="Ingrese usuario" name="usuario" id="usuario" value="<?= $usuario->usuario ?>"/>
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Contraseña</label>
        <input type="text" class="form-control" placeholder="Ingrese contraseña" name="password" id="password"/>
    </div>
    <hr>
    <div class="text-right">
        <button class="btn btn-primary mr-2" id="btn-guardar">Guardar</button>
        <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>
    </div>
</form>
