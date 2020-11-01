<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo  FRONT_ROOT."Home/Index"?> ">ChinemaCenter</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">  
      <?php  if($_SESSION["loggedUser"]->getRol() == 1){ ?>    
        <li class="nav-item">
          <a class="nav-link" href="<?php echo  FRONT_ROOT."Cine/ShowListView"?>">Cines</a>
        </li>
      <?php  } ?>   
      <li class="nav-item">
        <a class="nav-link" href="<?php echo  FRONT_ROOT."Pelicula/Index"?>">Peliculas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo  FRONT_ROOT."Pelicula/Cartelera"?>">Cartelera</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->   
    <button class="btn btn-link"><?php echo ucfirst( $_SESSION["loggedUser"]->getName()) ?></button> 
    <a class="btn btn-outline-danger" href="<?php echo  FRONT_ROOT."User/Logout "?>">Salir</a>
  </div>
</nav>