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
      <h3 class="text-center mt-2">Cantidades por Pelicula</h3>

      <?php 
        foreach($comprasList as $compra){
      ?>
        <div class="alert alert-primary text-center my-1" role="alert">
        <strong>Pelicula:</strong> <?php echo $compra->getPeliculaNombre() ?> / <strong>Cantidad:</strong> <?php echo $compra->getCantidad() ?> entradas
        </div>
      <?php
        }
      ?>

    </div>

  </div>

</div>