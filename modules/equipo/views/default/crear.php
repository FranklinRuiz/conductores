<form id="form-equipo">
    <div class="row form-group">
        <div class="col-md-6">
            <label>Tipo<span class="text-danger">*</span></label>
            <select class="form-control select2" id="tipo" name="tipo" style="width: 100%;">
                <option value="" selected disabled>Seleccione</option>
                <?php foreach ($tipo as $t): ?>
                    <option value="<?= $t->id_tipo ?>"><?= $t->nombre ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6">
            <label>Nombre<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Ingrese nombre" name="nombre" id="nombre" />
        </div>
    </div>
    <div class="form-group">
        <label>Descripción<span class="text-danger">*</span></label>
        <textarea class="form-control" placeholder="Ingrese descripción" name="descripcion" id="descripcion"></textarea>
    </div>
    <div>
        <label style="font-weight: bold;">Ficha Técnica</label>        
    </div>
    <div class="form-group">
        <label>Fabricante<span class="text-danger">*</span></label>
        <input type="text" class="form-control" placeholder="Ingrese fabricante" name="fabricante" id="fabricante"/>
    </div>
    <div class="row form-group">
        <div class="col-md-6">
            <label>Fecha Fabricación<span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="fecha_fabricacion" id="fecha_fabricacion"/>    
        </div>
        <div class="col-md-6">
            <label>Marca<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Ingrese marca" name="marca" id="marca"/>    
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6">
            <label>Modelo<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Ingrese modelo" name="modelo" id="modelo"/>
        </div>
        <div class="col-md-6">
            <label>Serie<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Ingrese serie" name="serie" id="serie"/>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6">
            <label>Vida Útil<span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Ingrese vida útil" name="vida_util" id="vida_util"/>
        </div>
        <div class="col-md-6">
            <label>Fecha Activación<span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="fecha_activacion" id="fecha_activacion"/>
        </div>
    </div>
    <hr>
    <div class="text-right">
        <button class="btn btn-primary mr-2" id="btn-guardar">Guardar</button>
        <a class="btn btn-secondary" id="btn-cancelar">Cancelar</a>
    </div>
</form>
