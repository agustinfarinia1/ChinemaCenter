<?php

include('nav-bar.php');
require_once("validate-session.php");

?>

<form class="form-inline" action="<?php echo FRONT_ROOT."Pelicula/Index" ?>" method="POST">

        <div class="form-group mb-2">
        <label for="genero" class="text-secondary" >Genero:</label>
        <select id="genero" name="genero">
            <?php
                 foreach ($this->generos as $genero) {
            
                echo "<option value= " .$genero->getIdGenero(). ">" .$genero->getGenero(). "</option>";
               
                }
            ?>  
        </select>
        </div>
        <div class="form-group mb-2">
            <label for="fechaEntrada"  class="text-secondary">Peliculas desde la fecha</label>
            <input type="date" name="fechainicio" id="fechaEntrada" min="2018-12-31">            
        </div>

        <div class="form-group mb-2">
            <label for="fechaSalida"  class="text-secondary">Hasta la fecha </label>
            <input type="date" name="fechafinal" id="fechaSalida" min="2020-10-15">   
        </div>
       
        <div class="form-group mb-2">
        <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
        
</form>
<div class="row">  
<?php foreach($this->peliculas as $pelicula) { ?>
     
        <div class="col-4 mb-4">
            <div class="card" style="width: 300px">
                <img src="https://image.tmdb.org/t/p/w500/<?php echo $pelicula->getFoto(); ?>" class="card-img-top" alt=" <?php  echo $pelicula->getNombre(); ?> "/>
                <div class="card-body" style="width: 300px">
                    <h6 class="text-primary"><?php echo $pelicula->getNombre(); ?> </h6>
                    <p class="text-primary"> <?php echo $pelicula->getComentarioCorto(); ?> </p>
                </div>
                <a 
                    class="btn btn-info btn-block"
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
