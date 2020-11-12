<?php

include('nav-bar.php');
require_once("validate-session.php");

?>

    <main class="min-vh-100 d-flex justify-content-center">

        <div class="w-75">

            <div id="carouselExampleIndicators" class="carousel slide mb-2" data-ride="carousel">
                <!-- <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol> -->
                <div class="carousel-inner">
                    <?php $funcion = array_shift($funcionesList) ?>
                    <div class="carousel-item active">
                        <img src="https://image.tmdb.org/t/p/w500<?php echo $funcion->getFoto(); ?>" class="d-block w-100" style="height: 300px;object-fit: cover;" alt="<?php echo $funcion->getNombrePelicula(); ?>">
                        <div class="carousel-caption d-none d-md-block">
                            <a class="btn btn-info" href="<?php echo  FRONT_ROOT. "Funcion/getFuncionPorId/" . $funcion->getIdFuncion()?>"><?php echo $funcion->getNombrePelicula(); ?></a>
                            <p><?php echo $funcion->getComentario(); ?></p>
                        </div>
                    </div>
                    <?php foreach($funcionesList as $funcion){ ?>
                        <?php if($funcion->getEstreno() == 1){ ?>
                            <div class="carousel-item">
                                <img src="https://image.tmdb.org/t/p/w500<?php echo $funcion->getFoto(); ?>" class="d-block w-100" style="height: 300px;object-fit: cover;" alt="<?php echo $funcion->getNombrePelicula(); ?>">
                                <div class="carousel-caption d-none d-md-block">
                                    <a class="btn btn-info" href="<?php echo  FRONT_ROOT."Funcion/getFuncionPorId/" . $funcion->getIdFuncion()?>"><?php echo $funcion->getNombrePelicula(); ?></a>
                                    <p><?php echo $funcion->getComentario(); ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="row"><!-- Lista de peliculas --> 
                <?php $i = 1; ?>
                <?php foreach($funcionesList as $funcion){ ?>
                    <?php if($funcion->getEstreno() == 0){ ?>
                        <?php if($i < 5){$i++;}else{$i = 1;} ?>
                        <div class="col-3 my-2 slide-top<?php echo $i; ?>">
                            <img src="https://image.tmdb.org/t/p/w500<?php echo $funcion->getPoster(); ?>" class="img-fluid rounded" alt="<?php echo $funcion->getNombrePelicula(); ?>">
                            <a class="btn btn-link btn-block" href="<?php echo  FRONT_ROOT."Funcion/getFuncionPorId/" . $funcion->getIdFuncion()?>"><?php echo $funcion->getNombrePelicula(); ?></a>
                        </div>
                        
                    <?php } ?>
                <?php } ?>
               

            </div><!-- Fin lista de peliculas -->
            
        </div>

        

    </main>