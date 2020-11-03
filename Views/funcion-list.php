<?php 
 include('nav-bar.php');
 require_once("validate-session.php");
?>

<div class="container min-vh-100">
    <div class="row">
        <div class="col-8 offset-2 mt-3">
            <div class="list-group-item list-group-item-action list-group-item-info d-flex justify-content-between align-items-center">
                <span>Cine: Nombre / Sala: Nombre / Hora: 17:30</span>
                <span>
                    <button class="btn btn-warning">Editar</button>
                    <button class="btn btn-danger">Eliminar</button>
                </span>               
            </div>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item list-group-item-action list-group-item-primary d-flex justify-content-between align-items-center">
                    03/11 Martes                    
                </li>
                <li class="list-group-item list-group-item-action list-group-item-primary d-flex justify-content-between align-items-center">
                    04/11 Mirecoles                   
                </li>    
            </ul>
        </div>

        <div class="col-8 offset-2 mt-3">
            <div class="list-group-item list-group-item-action list-group-item-info d-flex justify-content-between align-items-center">
                <span>Cine: Nombre / Sala: Nombre / Hora: 15:45</span>
                <span>
                    <button class="btn btn-warning">Editar</button>
                    <button class="btn btn-danger">Eliminar</button>
                </span>               
            </div>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item list-group-item-action list-group-item-primary d-flex justify-content-between align-items-center">
                    02/11 Lunes
                </li>                
                <li class="list-group-item list-group-item-action list-group-item-primary d-flex justify-content-between align-items-center">
                    05/11 Jueves
                </li>
                <li class="list-group-item list-group-item-action list-group-item-primary d-flex justify-content-between align-items-center">
                    06/11 Viernes
                </li>
            </ul>
        </div>
    </div>
</div>