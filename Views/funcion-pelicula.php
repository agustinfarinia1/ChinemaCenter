<?php 
 include('nav-bar.php');
 require_once("validate-session.php");
?>

<div class="container">
    <div class="row">
        <div class="col-3">
            <h3 class="text-center">Titulo pelicula</h3>
            <img src="https://image.tmdb.org/t/p/w500/ltyARDw2EFXZ2H2ERnlEctXPioP.jpg" class="img-fluid rounded" alt="">
            <p class="text-center">
                A lowly utility worker is called to the future by a mysterious radio signal, he must leave his dying wife to embark on a journey that will force him to face his deepest fears in an attempt to change the fabric of reality and save humankind from its greatest environmental crisis yet.
            </p>
        </div>
        <div class="col-9 py-5">            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Cine: Nombre</li>
                    <li class="breadcrumb-item active" aria-current="page">Sala: Nombre</li>
                    <li class="breadcrumb-item active" aria-current="page">Hora: 17:30</li>
                </ol>
            </nav>
            <ul class="list-group list-group-flush mb-4">               
                <li class="list-group-item list-group-item-action list-group-item-primary d-flex justify-content-between align-items-center">
                    03/11 Martes
                    <button class="btn btn-primary" data-toggle="modal" data-target="#comprarEntrada">
                        Comprar
                    </button>
                </li>
                <li class="list-group-item list-group-item-action list-group-item-primary d-flex justify-content-between align-items-center">
                    04/11 Mirecoles
                    <button class="btn btn-primary">Comprar</button>
                </li>               
            </ul>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Cine: Nombre</li>
                    <li class="breadcrumb-item active" aria-current="page">Sala: Nombre</li>
                    <li class="breadcrumb-item active" aria-current="page">Hora: 15:45</li>
                </ol>
            </nav>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item list-group-item-action list-group-item-primary d-flex justify-content-between align-items-center">
                    02/11 Lunes
                    <button class="btn btn-primary">Comprar</button>
                </li>                
                <li class="list-group-item list-group-item-action list-group-item-primary d-flex justify-content-between align-items-center">
                    05/11 Jueves
                    <button class="btn btn-primary">Comprar</button>
                </li>
                <li class="list-group-item list-group-item-action list-group-item-primary d-flex justify-content-between align-items-center">
                    06/11 Viernes
                    <button class="btn btn-primary">Comprar</button>
                </li>
            </ul>
        </div>
    </div>
</div>  

<!-- Modal -->
<div class="modal fade" id="comprarEntrada" tabindex="-1" aria-labelledby="comprarEntradaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-primary" id="comprarEntradaLabel">Confirmar compra</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-primary">
                <div class="text-center">
                    <span class="font-weight-bold">Fecha:</span> 16/11/2020 17:30
                </div>
                <div class="text-center">
                    <span class="font-weight-bold">Cine:</span> Nombre del cine
                </div>
                <div class="text-center">
                    <span class="font-weight-bold">Sala:</span> Nombre de la sala
                </div>
                <div class="text-center">
                    <span class="font-weight-bold">Pelicula:</span> Titulo
                </div> 
                <div class="text-center">
                    <span class="font-weight-bold">Costo:</span> $250
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Comprar</button>
            </div>
        </div>
    </div>
</div>
    