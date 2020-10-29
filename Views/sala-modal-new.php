<div 
    class="modal fade" 
    id="newSala<?php echo $cine->getId(); ?>" 
    tabindex="-1" 
    aria-labelledby="newSalaModalLabel" 
    aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="newSalaModalLabel">Nueva Sala en: <?php echo $cine->getNombre(); ?></h5>        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?php echo  FRONT_ROOT."Sala/Add "?>" method="post" >
        <div class="modal-body">
          <div class="form-group">
            <label for="nueva-sala-nombre" class="col-form-label text-secondary">Nombre:</label>
            <input type="text" name="nombre" class="form-control" id="nueva-sala-nombre" required>
          </div>         
          <div class="form-group">
            <label for="nuevo-sala-capacidad" class="col-form-label text-secondary">Capacidad:</label>
            <input type="number" name="capacidad" class="form-control" id="nuevo-sala-capacidad" min="0" required>
          </div>
          <div class="form-group">
            <label for="nuevo-sala-valor" class="col-form-label text-secondary">Valor de la entrada:</label>
            <input type="number" name="valor" class="form-control" id="nuevo-sala-valor" min="0" required>
          </div>
         
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button 
                type="submit" 
                class="btn btn-primary"
                name="idCine"
                value=<?php echo $cine->getId(); ?>
            >Crear Sala</button>
        </div>
      </form>
    </div>
  </div>
</div>