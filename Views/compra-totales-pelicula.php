<?php

include('nav-bar.php');
 require_once("validate-session.php");
?>

<div class="container-fluid">

  <div class="row">
  
    <div class="col-3 min-vh-100 d-flex align-items-center justify-content-center">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo  FRONT_ROOT . "Compra/cantidadesCine" ?>">Cantidades por cine</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo  FRONT_ROOT . "Compra/cantidadesPelicula" ?>">Cantidades por pelicula</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo  FRONT_ROOT . "Compra/totalesCine" ?>">Total por cines entre fechas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo  FRONT_ROOT . "Compra/totalesPelicula" ?>">Total por pelicula entre fechas</a>
        </li>
      </ul>
    </div>

    <div class="col-9">
      <h3 class="text-center mt-2">Totales por Pelicula</h3>
      <hr class="border-bottom" />
      <form class="form-inline d-flex justify-content-between col-12 my-3" action="<?php echo FRONT_ROOT."Compra/totalesPelicula" ?>" method="POST">            
            
            <div class="form-group">
                <label for="fechaEntrada"  class="my-1 mr-2">Peliculas desde</label>
                <input class="form-control" type="date" name="fechainicio" id="fechaEntrada" value="<?php echo date("Y-m-d"); ?>"">            
            </div>

            <div class="form-group">
                <label for="fechaSalida"  class="my-1 mr-2">Hasta </label>
                <input class="form-control" type="date" name="fechafinal" id="fechaSalida" value="<?php echo date("Y-m-d"); ?>"">   
            </div>           
            
            <button type="submit" class="btn btn-primary mx-2">Buscar</button>
                
        </form>
      <?php 
        foreach($comprasList as $compra){
      ?>
        <div class="alert alert-primary text-center my-1" role="alert">
        <strong>Pelicula:</strong> <?php echo $compra->getPeliculaNombre() ?> / <strong>Total:</strong> <?php echo $compra->getCantidad() ?>$
        </div>
      <?php
        }
      ?>
    </div>
  </div>

</div>