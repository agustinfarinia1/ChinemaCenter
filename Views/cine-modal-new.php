


<div class="modal fade" id="newCine" tabindex="-1" aria-labelledby="newCineModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="newCineModalLabel">Nuevo Cine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?php echo  FRONT_ROOT."Cine/Add "?>" method="post" >
        <div class="modal-body">
          <div class="form-group">
            <label for="nuevo-cine-nombre" class="col-form-label text-secondary">Nombre:</label>
            <input type="text" name="nombre" class="form-control" id="nuevo-cine-nombre">
          </div>
          <div class="form-group">
            <label for="nuevo-cine-direccion" class="col-form-label text-secondary">Direccion:</label>
            <input type="text" name="direccion" class="form-control" id="nuevo-cine-direccion">
          </div>
          <div class="form-group">
            <label for="nuevo-cine-capacidad" class="col-form-label text-secondary">Capacidad:</label>
            <input type="number" name="capacidad" class="form-control" id="nuevo-cine-capacidad">
          </div>
          <div class="form-group">
            <label for="nuevo-cine-valor" class="col-form-label text-secondary">Valor de la entrada:</label>
            <input type="number" name="valor" class="form-control" id="nuevo-cine-valor">
          </div>
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Crear Cine</button>
        </div>
      </form>
    </div>
  </div>
</div>