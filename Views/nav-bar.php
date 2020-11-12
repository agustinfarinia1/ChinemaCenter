<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo  FRONT_ROOT."Funcion/Cartelera"?> ">ChinemaCenter</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">        
      <?php  if($_SESSION["loggedUser"]->getRol() == 1){ ?> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navAdministracion" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Administracion
          </a>
          <div class="dropdown-menu" aria-labelledby="navAdministracion">
            <a class="dropdown-item" href="<?php echo  FRONT_ROOT."Cine/ShowListView"?>">Cines</a>
            <a class="dropdown-item" href="<?php echo  FRONT_ROOT."Funcion/GetAll"?>">Funciones</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo  VIEWS_PATH."statistics.php"?>">Estadisticas</a>
          </div>
        </li>
      <?php  } ?> 
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo  FRONT_ROOT."Pelicula/Index"?>">Peliculas</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo  FRONT_ROOT."Funcion/Cartelera"?>">Cartelera</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navPeliculas" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Peliculas
        </a>
        <div class="dropdown-menu" aria-labelledby="navPeliculas">       
          <a class="dropdown-item" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Pelicula 1</a>
          <a class="dropdown-item" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Pelicula 2</a>
          <a class="dropdown-item" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Pelicula 3</a>
          <a class="dropdown-item" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Pelicula 4</a>
          <a class="dropdown-item" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Pelicula 5</a>
          <a class="dropdown-item" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Pelicula 6</a>
          <a class="dropdown-item" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Pelicula 7</a>
          <a class="dropdown-item" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Pelicula 8</a>
          <a class="dropdown-item" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Pelicula 9</a>
          <a class="dropdown-item" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Pelicula 10</a>
          <a class="dropdown-item" href="<?php echo  FRONT_ROOT."Funcion/Pelicula"?>">Pelicula 11</a>
        </div>
      </li>  -->
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->      
    <button class="btn btn-link"><?php echo ucfirst( $_SESSION["loggedUser"]->getName()) ?></button> 
    <a class="btn btn-outline-danger" href="<?php echo  FRONT_ROOT."User/Logout "?>">Salir</a>
  </div>
</nav>