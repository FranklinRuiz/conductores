<form id="form-perfil">
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Nombre Perfil</label>
        <input type="text" class="form-control" placeholder="Ingrese nombre del perfil" name="nombre" id="nombre"/>
    </div>
    <div class="fv-row mb-5">
        <label  class="required fw-bold fs-6 mb-2">Descripción</label>
        <textarea type="text" class="form-control" placeholder="Ingrese descripción" name="descripcion" id="descripcion" ></textarea>
    </div>
    <div class="fv-row mb-5">
        <label style="font-weight: bold;">Módulos</label>
        <div class="fv-row mb-5 row">
            <?php foreach ($modulo as $m): ?>
                <label class="col-3 col-form-label"><?= $m->nombre_opcion ?></label>
                <div class="col-3">

                    <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                        <!--begin::Input-->
                        <input class="form-check-input" type="checkbox" name="modulo[]" value="<?= $m->id_opcion ?>" id="modulo">
                        <!--end::Input-->
                    </label>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <hr>
    <div class="text-right">
        <button class="btn btn-primary mr-2" id="btn-guardar">Guardar</button>
        <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>
    </div>
</form>
