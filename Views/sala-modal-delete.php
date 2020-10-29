
<!-- Modal -->
<div 
    class="modal fade" 
    id="deleteSala<?php echo $sala->getId(); ?>" 
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
        <h5><?php echo $sala->getNombre(); ?></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
        <form action="<?php echo FRONT_ROOT."Sala/Remove" ?>" method="post">
          <button 
            type="submit" 
            name="id"  
            value="<?php echo $sala->getId() ?>"
            class="btn btn-danger"
          >Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>