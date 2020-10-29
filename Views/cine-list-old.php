<?php 
 include('nav-bar.php');
 require_once("validate-session.php");
?>
<h2 class="text-primary text-center my-4">Cines</h2>

<table class="table table-hover table-dark text-center">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Direccion</th>
      <th scope="col">Capacidad</th>
      <th scope="col">Precio</th>
      <th scope="col" colspan="2">
        <button 
            class="btn btn-primary btn-block"
            data-toggle="modal" 
            data-target="#newCine"
        >Nuevo</button> 
      </th>
    </tr>
  </thead>
  <tbody>

  <?php 
    foreach($cineList as $cine){
   ?>

        <tr>
        <th scope="row"><?php echo $cine->getNombre(); ?></th>
        <td> <?php echo $cine->getDireccion(); ?> </td>
        <td> <?php echo $cine->getCapacidad(); ?> </td>
        <td> <?php echo $cine->getPrecio(); ?> </td>
        <td>
            <button 
                class="btn btn-outline-warning btn-block"
                data-toggle="modal" 
                data-target="#editCine<?php echo $cine->getId(); ?>"
            >Editar</button>
        </td>
        <td>
            <button 
                class="btn btn-outline-danger btn-block"
                data-toggle="modal" 
                data-target="#deleteCine<?php echo $cine->getId(); ?>"
            >Eliminar</button>
        </td>
        </tr>

    <?php 
        }
    ?>    
   
  </tbody>
</table>

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


<?php 
    foreach($cineList as $cine){
        include('cine-modal-edit.php');
        include('cine-modal-delete.php');
    }
?>

