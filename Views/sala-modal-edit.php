<div 
    class="modal fade" 
    id="editSala<?php echo $sala->getId(); ?>" 
    tabindex="-1" 
    aria-labelledby="newSalaModalLabel" 
    aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="newSalaModalLabel">Sala <?php echo $sala->getNombre(); ?></h5>        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?php echo  FRONT_ROOT."Sala/Edit "?>" method="post" >
        <div class="modal-body">
          <div class="form-group">
            <label for="nueva-sala-nombre" class="col-form-label text-secondary">Nombre:</label>
            <input type="text" value="<?php echo $sala->getNombre(); ?>" name="nombre" class="form-control" id="nueva-sala-nombre" required>
          </div>         
          <div class="form-group">
            <label for="nuevo-sala-capacidad" class="col-form-label text-secondary">Capacidad:</label>
            <input type="number" name="capacidad" value=<?php echo $sala->getCapacidad(); ?> class="form-control" id="nuevo-sala-capacidad" min="0" required>
          </div>
          <div class="form-group">
            <label for="nuevo-sala-valor" class="col-form-label text-secondary">Valor de la entrada:</label>
            <input type="number" name="valor" value=<?php echo $sala->getPrecio(); ?> class="form-control" id="nuevo-sala-valor" min="0" required>
          </div>
         
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button 
                type="submit" 
                class="btn btn-warning"
                name="id"
                value=<?php echo $sala->getId(); ?>
            >Editar Sala</button>
        </div>
      </form>
    </div>
  </div>
</div>