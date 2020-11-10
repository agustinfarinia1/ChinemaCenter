<?php

include('nav-bar.php');
require_once("validate-session.php");

?>


<main class="min-vh-100 d-flex align-items-center justify-content-center">

    <div style="width: 400px; background-color: #273c75;" class="px-2 py-5 rounded">
        <h2 class="text-center">Nueva Funcion</h2>

        <h4 class="text-center"><?php echo "ID Sala: " .  $_SESSION["sala"]?></h4>
        <h4 class="text-center"><?php echo "ID pelicula: " .  $_SESSION["idPelicula"]?></h4>   

           
        <form action="<?php echo FRONT_ROOT."Funcion/Add" ?>" method="POST" class="mt-4">
            <div class="form-group row">
                <label for="fechaEntrada"  class="col-sm-4 col-form-label">Fecha de Inicio</label>
                <div class="col-sm-8">
                    <input 
                        type="date" 
                        class="form-control"
                        name="fechainicio" 
                        id="fechaEntrada" 
                        value="<?php echo date("Y-m-d"); ?>"  
                        min="<?php echo date("Y-m-d"); ?>"
                    >     
                </div>                        
            </div>

            <hr class="border-bottom" />

            <div class="form-group row">
                <label for="fechaEntrada"  class=" col-sm-4 col-form-label">Fecha de fin</label>
                <div class="col-sm-8">
                <input 
                        type="date" 
                        class="form-control"
                        name="fechafin" 
                        id="fechaEntrada" 
                        value="<?php echo date("Y-m-d"); ?>"  
                        min="<?php echo date("Y-m-d"); ?>"
                    >        
                </div>                     
            </div>

            <hr class="border-bottom" />

            <div class="form-group row">
                <label for="fechaEntrada"  class=" col-sm-4 col-form-label">Hora</label>
                <div class="col-sm-8">
                    <input 
                        type="time" 
                        class="form-control"
                        name="hora" 
                        id="fechaEntrada" 
                        value="<?php echo date("H:i"); ?>"  
                    > 
                </div>               
            </div>

            <hr class="border-bottom" />
           
            <div class="row d-flex justify-content-center">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="lunes" name="lunes" value="lunes">
                    <label class="form-check-label" for="lunes">Lunes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="martes" name="martes" value="martes">
                    <label class="form-check-label" for="martes">Martes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="miercoles" name="miercoles" value="miercoles">
                    <label class="form-check-label" for="miercoles">Miercoles</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="jueves" name="jueves" value="jueves">
                    <label class="form-check-label" for="jueves">Jueves</label>
                </div>
            </div>
            <div class="row d-flex justify-content-center mb-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="viernes" name="viernes" value="viernes">
                    <label class="form-check-label" for="viernes">Viernes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="sabado" name="sabado" value="sabado">
                    <label class="form-check-label" for="sabado">Sabado</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="domingo" name="domingo" value="domingo">
                    <label class="form-check-label" for="domingo">Domingo</label>
                </div>               
            </div>

            <button 
                class="btn btn-primary btn-block mt-4"
            >
                Agregar Funcion
            </button>
        </from>   
        
    </div>

   
</main>


