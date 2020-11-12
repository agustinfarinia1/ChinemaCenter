<?php

include('nav-bar.php');
require_once("validate-session.php");
use Controllers\PeliculaController as PeliculaController;

$controller = new PeliculaController();

?>
<div class="container">
    <div class="col-6 offset-3">
        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#actualizarPeliculas">
            Actualizar el archivo de peliculas
        </button>
    </div>    
    <div class="row">
        <form class="form-inline d-flex justify-content-between col-12 my-3" action="<?php echo FRONT_ROOT."Pelicula/Index" ?>" method="POST">            
            <div class="form-group">
                <label class="my-1 mr-2" for="genero">Genero</label>
                <select class="custom-select my-1 mr-sm-2" id="genero" name="genero">
                    <?php
                        foreach ($this->generos as $genero) {
                        echo "<option value= " .$genero->getIdGenero(). ">" .$genero->getGenero(). "</option>";
                    
                        }
                    ?>  
                </select>
            </div>
            <div class="form-group">
                <label for="fechaEntrada"  class="my-1 mr-2">Peliculas desde</label>
                <input class="form-control" type="date" name="fechainicio" id="fechaEntrada" min="2018-12-31">            
            </div>

            <div class="form-group">
                <label for="fechaSalida"  class="my-1 mr-2">Hasta </label>
                <input class="form-control" type="date" name="fechafinal" id="fechaSalida" min="2020-10-15">   
            </div>           
            
            <button type="submit" class="btn btn-primary mx-2">Buscar</button>
                
        </form>

        <div class="row">  
        <?php
        foreach($this->contenidoPagina as $pelicula) { 
            ?>
                <div class="col-3 mb-4">
                    <div class="bg-light p-1 rounded">
                        <button class="btn btn-link btn-block"><?php echo $pelicula->getNombre(); ?> </button>
                        <?php if($pelicula->getFoto()){ ?>
                            <img src="https://image.tmdb.org/t/p/w500/<?php echo $pelicula->getFoto(); ?>" class="img-fluid rounded" alt="">

                        <?php }
                        else{ ?>
                            <img src="<?php echo  IMG_PATH."not-Found.png" ?>" class="img-fluid rounded" alt="">
                       <?php } ?>

                        <a 
                            class="btn btn-info btn-block mt-1"
                            href="<?php echo  FRONT_ROOT."Funcion/SetPelicula/".$pelicula->getId() ?>"
                        >
                            Selecionar Pelicula
                        </a>
                    </div>           
                </div>     
            
        <?php
            }
            
        ?>
        </div>
    </div>



        <nav aria-label="paginacion">
        <ul class="pagination justify-content-center">
                <?php if($pagina >= 2){ 
                    $anterior = $pagina - 1;
                        if($fecha_min){
                                if($fecha_max){ ?>
                                    <li class="page-item"><a class="page-link" href="<?php echo  FRONT_ROOT."Pelicula/Index/$generoBusqueda/$fecha_min/$fecha_max/$anterior" ?>"  aria-label="Previous">
                                <?php }
                                else{ ?>
                                    <li class="page-item"><a class="page-link" href="<?php echo  FRONT_ROOT."Pelicula/Index/$generoBusqueda/$fecha_min/2000-01-01/$anterior" ?>"  aria-label="Previous">
                            <?php }
                        }
                        else{
                        if($fecha_max)
                        { ?>
                            <li class="page-item"><a class="page-link" href="<?php echo  FRONT_ROOT."Pelicula/Index/$generoBusqueda/2000-01-01/$fecha_max/$anterior" ?>"  aria-label="Previous">
                    <?php }
                        else{
                            ?>
                            <li class="page-item"><a class="page-link" href="<?php echo  FRONT_ROOT."Pelicula/Index/$generoBusqueda/2000-01-01/2000-01-01/$anterior" ?>"  aria-label="Previous">
                     <?php }
                    } ?>
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                    <li class="page-item"><span class="page-link" href="#"><?php echo $anterior ?></span></li>
            <?php } ?>
            <li class="page-item active"><span class="page-link" href="#"><?php echo $pagina ?></span></li>

            <?php if($pagina < $this->paginaMax){
                //$generoBusqueda.'/'.$fecha_min.'/'.$fecha_max.'/'.$pagina'
                $siguiente = $pagina + 1;
                ?>
                     <li class="page-item"><span class="page-link" href="#"><?php echo $siguiente ?></span></li>
                    </li> <?php

                    if($fecha_min){
                        if($fecha_max){ ?>
                            <li class="page-item"><a class="page-link" href="<?php echo  FRONT_ROOT."Pelicula/Index/$generoBusqueda/$fecha_min/$fecha_max/$siguiente" ?>"  aria-label="Next">
                       <?php }
                       else{ ?>
                        <li class="page-item"><a class="page-link" href="<?php echo  FRONT_ROOT."Pelicula/Index/$generoBusqueda/$fecha_min/2000-01-01/$siguiente" ?>"  aria-label="Next">
                      <?php }
                    }
                    else{
                        if($fecha_max)
                        { ?>
                            <li class="page-item"><a class="page-link" href="<?php echo  FRONT_ROOT."Pelicula/Index/$generoBusqueda/2000-01-01/$fecha_max/$siguiente" ?>"  aria-label="Next">
                    <?php }
                        else{
                            ?>
                            <li class="page-item"><a class="page-link" href="<?php echo  FRONT_ROOT."Pelicula/Index/$generoBusqueda/2000-01-01/2000-01-01/$siguiente" ?>"  aria-label="Next">
                     <?php }
                    } ?>
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                <?php } ?>
        </ul>
        </nav>
</div>

<!-- Modal -->
<div class="modal fade" id="actualizarPeliculas" tabindex="-1" aria-labelledby="actualizarPeliculasLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h3 class="modal-title" id="actualizarPeliculasLabel">Actulizar peliculas</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
            <strong>Precaucion:</strong> Esta operacion puede tardar unos minutos. Recuerde que se actualizan las peliculas de sus archivos con recursos externos
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-outline-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
