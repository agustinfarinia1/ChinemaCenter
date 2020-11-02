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
                    <button class="btn btn-primary">Comprar</button>
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
    