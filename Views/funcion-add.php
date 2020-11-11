<?php

include('nav-bar.php');
require_once("validate-session.php");
if(!isset($funcionesList)) $funcionesList=[];
?>

<?php if( count($funcionesList) > 0){ ?>
<div class="row">
    <div class="col-8 offset-2 mt-3">
        <div class="alert alert-danger" role="alert">
            <strong>Advertencia!!</strong> Intenta agregar una funcion que superpone a otras
        </div>
    </div>
</div>
<?php } ?>
<?php foreach($funcionesList as $funcion){ ?>
    <div class="row">
        <div class="col-8 offset-2 mt-3">
            <div class="list-group-item list-group-item-action list-group-item-info">
                <div class="text-center">
                    Cine: Nombre | 
                    Sala: <?php echo $_SESSION["sala"];?> | 
                    Desde: <?php $desde = date_create_from_format('Y-m-d', $funcion->getFechaInicio()); echo date_format($desde, "d/m/Y"); ?> |
                    Hasta: <?php $hasta = date_create_from_format('Y-m-d', $funcion->getFechaFin()); echo date_format($hasta, "d/m/Y"); ?> |
                    Inicio: <?php $inicio = date_create_from_format('H:i:s', $funcion->getHoraInicio()); echo date_format($inicio, "H:i"); ?> |
                    Fin: <?php $fin = date_create_from_format('H:i:s', $funcion->getHoraFin()); echo date_format($fin, "H:i"); ?>    
                </div>
                <div class="text-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="lunes" <?php if($funcion->getLunes()) echo "checked" ?> disabled>
                        <label class="form-check-label" for="lunes">Lunes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="martes" <?php if($funcion->getMartes()) echo "checked" ?> disabled>
                        <label class="form-check-label" for="martes">Martes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="miercoles" <?php if($funcion->getMiercoles()) echo "checked" ?> disabled>
                        <label class="form-check-label" for="miercoles">Miercoles</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="jueves" <?php if($funcion->getJueves()) echo "checked" ?> disabled>
                        <label class="form-check-label" for="jueves">Jueves</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="viernes" <?php if($funcion->getViernes()) echo "checked" ?> disabled>
                        <label class="form-check-label" for="viernes">Viernes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="sabado" <?php if($funcion->getSabado()) echo "checked" ?> disabled>
                        <label class="form-check-label" for="sabado">Sabado</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="domingo" <?php if($funcion->getDomingo()) echo "checked" ?> disabled>
                        <label class="form-check-label" for="domingo">Domingo</label>
                    </div>
                </div>                                         
            </div>
        </div>
    </div>
<?php } ?>

<main class="min-vh-100 d-flex align-items-center justify-content-center">

    <div style="width: 400px; background-color: #273c75;" class="px-2 py-5 rounded">
        <h2 class="text-center">Nueva Funcion</h2>

        <h4 class="text-center"><?php echo "ID Sala: " .  $_SESSION["sala"]?></h4>
        <h4 class="text-center"><?php echo "ID pelicula: " .  $_SESSION["idPelicula"]?></h4>   

           
        <form action="<?php echo FRONT_ROOT."Funcion/Add" ?>" method="POST" class="mt-4">
            <div class="form-group row">
                <label for="fechaInicio"  class="col-sm-4 col-form-label">Fecha de Inicio</label>
                <div class="col-sm-8">
                    <input 
                        type="date" 
                        class="form-control"
                        name="fechainicio" 
                        id="fechainicio" 
                        value="<?php echo date("Y-m-d"); ?>"  
                        min="<?php echo date("Y-m-d"); ?>"
                    >     
                </div>                        
            </div>

            <hr class="border-bottom" />

            <div class="form-group row">
                <label for="fechafin"  class=" col-sm-4 col-form-label">Fecha de fin</label>
                <div class="col-sm-8">
                <input 
                        type="date" 
                        class="form-control"
                        name="fechafin" 
                        id="fechafin" 
                        value="<?php echo date("Y-m-d"); ?>"  
                        min="<?php echo date("Y-m-d"); ?>"
                    >        
                </div>                     
            </div>

            <hr class="border-bottom" />

            <div class="form-group row">
                <label for="hora"  class=" col-sm-4 col-form-label">Hora</label>
                <div class="col-sm-8">
                    <input 
                        type="time" 
                        class="form-control"
                        name="hora" 
                        id="hora" 
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


