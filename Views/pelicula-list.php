<?php

include('nav-bar.php');
require_once("validate-session.php");

?>
<div class="container">
    <div class="col-6 offset-3">
        <button type="button" class="btn btn-danger btn-block">Actualizar el archivo de peliculas</button>
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
        <?php foreach($this->peliculas as $pelicula) { ?>
            
                <!-- <div class="col-4 mb-4">
                    <div class="card" style="width: 300px">
                        <img src="https://image.tmdb.org/t/p/w500/<?php echo $pelicula->getFoto(); ?>" class="card-img-top" alt=" <?php  echo $pelicula->getNombre(); ?> "/>
                        <div class="card-body" style="width: 300px">
                            <h6 class="text-primary"><?php echo $pelicula->getNombre(); ?> </h6>
                            <p class="text-primary"> <?php echo $pelicula->getComentario(); ?> </p>
                        </div>
                        <a 
                            class="btn btn-info btn-block"
                            href="<?php echo  FRONT_ROOT."Funcion/SetPelicula/".$pelicula->getId() ?>"
                        >
                            Selecionar Pelicula
                        </a>
                    </div>            
                </div>  -->
                <div class="col-3 mb-4">
                    <div class="bg-light p-1 rounded">
                        <button class="btn btn-link btn-block"><?php echo $pelicula->getNombre(); ?> </button>
                        <img src="https://image.tmdb.org/t/p/w500/<?php echo $pelicula->getFoto(); ?>" class="img-fluid rounded" alt="">
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
</div>
