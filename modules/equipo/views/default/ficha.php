<div >
    <div class="form-group">
        <label>Fabricante</label>
        <input type="text" class="form-control"  readonly value="<?= $ficha->fabricante ?>"/>
    </div>
    <div class="row form-group">
        <div class="col-md-6">
            <label>Fecha Fabricación</label>
            <input type="date" class="form-control"  readonly value="<?= $ficha->fecha_fabricacion ?>"/>    
        </div>
        <div class="col-md-6">
            <label>Marca</label>
            <input type="text" class="form-control" readonly value="<?= $ficha->marca ?>"/>    
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6">
            <label>Modelo</label>
            <input type="text" class="form-control"  readonly value="<?= $ficha->modelo ?>"/>
        </div>
        <div class="col-md-6">
            <label>Serie</label>
            <input type="text" class="form-control" readonly value="<?= $ficha->serie ?>"/>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6">
            <label>Vida Útil</label>
            <input type="text" class="form-control"  readonly value="<?= $ficha->vida_util ?>"/>
        </div>
        <div class="col-md-6">
            <label>Fecha Activación</label>
            <input type="date" class="form-control" readonly value="<?= $ficha->fecha_activacion ?>"/>
        </div>
    </div>
    <hr>
    <div class="text-center">
        <a class="btn btn-secondary" id="btn-cancelar">Cerrar</a>
    </div>
</div>
