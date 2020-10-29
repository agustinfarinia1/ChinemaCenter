<?php

include('nav-bar.php');
require_once("validate-session.php");

?>


<main class="min-vh-100 d-flex align-items-center justify-content-center">

    <div style="width: 700px">
        <h2 class="text-center">Funcion add</h2>

        <h4 class="text-center"><?php echo "ID Sala: " .  $_SESSION["sala"]?></h4>
        <h4 class="text-center"><?php echo "ID pelicula: " .  $_SESSION["idPelicula"]?></h4>   

        <form action="<?php echo FRONT_ROOT."Funcion/Add" ?>" method="POST">
            <div class="form-group mb-2">
                <label for="fechaEntrada"  class="text-secondary">Iniocio funcion</label>
                <input type="datetime-local" name="fechainicio" id="fechaEntrada" min="2018-12-31">            
            </div>
            <button 
                class="btn btn-primary btn-block"
            >
                Agregar Funcion
            </button>
        </from>   
        
    </div>

   
</main>


