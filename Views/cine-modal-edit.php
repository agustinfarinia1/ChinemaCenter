
<div 
    class="modal fade" 
    id="editCine<?php echo $cine->getId(); ?>" 
    tabindex="-1" 
    aria-labelledby="editCineModalLabel" 
    aria-hidden="true"
>

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-warning" id="ediCineModalLabel">Editar Cine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo FRONT_ROOT."Cine/Edit" ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="edit-cine-nombre" class="col-form-label text-secondary">Nombre:</label>
            <input type="text" value="<?php echo $cine->getNombre(); ?>" name="nombre" class="form-control" id="edit-cine-nombre">
          </div>
          <div class="form-group">
            <label for="edit-cine-direccion" class="col-form-label text-secondary">Direccion:</label>
            <input type="text" value="<?php echo $cine->getDireccion(); ?>" name="direccion" class="form-control" id="edit-cine-direccion">
          </div>
          <div class="form-group">
            <label for="edit-cine-capacidad" class="col-form-label text-secondary">Capacidad:</label>
            <input type="number" value=<?php echo $cine->getCapacidad(); ?> name="capacidad" class="form-control" id="edit-cine-capacidad">
          </div>
          <div class="form-group">
            <label for="edit-cine-valor" class="col-form-label text-secondary">Valor de la entrada:</label>
            <input type="text" value=<?php echo $cine->getPrecio(); ?> name="valor" class="form-control" id="edit-cine-valor">
          </div>
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button 
            type="submit" 
            class="btn btn-warning"
            name="id"
            value=<?php echo $cine->getId(); ?>
          >Editar Cine</button>
        </div>
      </form>
    </div>
  </div>
</div>
