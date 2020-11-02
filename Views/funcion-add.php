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
                        name="fechainicio" 
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
                        name="fechainicio" 
                        id="fechaEntrada" 
                        value="<?php echo date("H:i"); ?>"  
                    > 
                </div>               
            </div>

            <hr class="border-bottom" />
           
            <div class="row d-flex justify-content-center">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">Lunes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">Martes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                    <label class="form-check-label" for="inlineCheckbox3">Miercoles</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                    <label class="form-check-label" for="inlineCheckbox3">Jueves</label>
                </div>
            </div>
            <div class="row d-flex justify-content-center mb-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">Viernes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">Sabado</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                    <label class="form-check-label" for="inlineCheckbox3">Domingo</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                    <label class="form-check-label" for="inlineCheckbox3">Todos</label>
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


