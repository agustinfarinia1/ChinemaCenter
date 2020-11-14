
<!-- Modal -->
<div 
    class="modal fade" 
    id="deleteFuncion<?php echo $funcion->getIdFuncion(); ?>" 
    tabindex="-1" 
    aria-labelledby="deleteCineModalLabel" 
    aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="deleteCineModalLabel">Esta seguro de Eliminar:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-secondary">
        <h5>Cine: <?php echo $funcion->getNombreCine(); ?></h5>
        <h5>Sala: <?php echo $funcion->getNombreSala(); ?></h5>
        <h5>Pelicula: <?php echo $funcion->getNombrePelicula(); ?></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
        <form action="<?php echo FRONT_ROOT."Funcion/remove" ?>" method="post">
          <button 
            type="submit" 
            name="id"  
            value="<?php echo $funcion->getIdFuncion();?>"
            class="btn btn-danger"
          >Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>