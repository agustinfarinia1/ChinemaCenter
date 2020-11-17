<?php 
 include('nav-bar.php');
 require_once("validate-session.php");

 use Controllers\FuncionController as FuncionController;
 if($op == 1){ 
     ?>
    <div class="row">
        <div class="col-8 offset-2 mt-3">
            <div class="alert alert-success" role="alert">
                <strong>Felicidades!!</strong>  <?php echo str_replace("-", " ",$mensaje); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php } ?>
<?php if( $op == 2){ ?>
<div class="row">
    <div class="col-8 offset-2 mt-3">
        <div class="alert alert-danger" role="alert">
            <strong>Advertencia!!</strong> <?php echo str_replace("-", " ",$mensaje); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
<?php } ?>
<div class="container">
    <div class="row">
        <div class="col-3">
            <h3 class="text-center"><?php echo $funcion->getNombrePelicula(); ?></h3>
            <img src="https://image.tmdb.org/t/p/w500<?php echo $funcion->getPoster(); ?>" class="img-fluid rounded" alt="">
            <p class="text-center">
                <?php echo $funcion->getComentario(); ?>
            </p>
        </div>
        <div class="col-9 py-5">            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Cine: <?php echo $funcion->getNombreCine();?></li>
                    <li class="breadcrumb-item active" aria-current="page">Sala: <?php echo $funcion->getNombreSala();?></li>
                    <li class="breadcrumb-item active" aria-current="page">Hora: <?php $inicio = date_create_from_format('H:i:s', $funcion->getHoraInicio()); echo date_format($inicio, "H:i"); ?></li>
                </ol>
            </nav>
            <ul class="list-group list-group-flush mb-4">
               <?php
               $_SESSION["idFuncion"] = $funcion->getIdFuncion();
               $diaFuncion = $funcion->getFechaInicio();
               $dias = array("domingo","lunes","martes","miercoles","jueves","viernes","sabado"); 
               $diaSemana = date("w");
               $controller = new FuncionController();
               //SI QUEREMOS MOSTRARLO EN ESPAÑOL FACILMENTE
               while($diaFuncion <= $funcion->getFechaFin()){
                   if($diaFuncion >=  date("Y-m-d")){
                        if($controller->comprobarFechaFuncion($funcion,$diaSemana)){ ?>
                            <li class="list-group-item list-group-item-action list-group-item-primary d-flex justify-content-between align-items-center">
                                <?php echo date("d/m",strtotime($diaFuncion))." ".$dias[$diaSemana];?>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#comprarEntrada<?php echo $diaFuncion; ?>" data-target="#comprarEntrada<?php echo $diaFuncion; ?>">
                                    Comprar
                                </button>
                            </li>
                            <?php 
                                include('funcion-modal-compra.php');
                        }   
                   }
                    $diaFuncion = date("Y-m-d",strtotime($diaFuncion."+ 1 days")); 
                    $diaSemana = date("w",strtotime($diaFuncion)); 
                } ?>       
            </ul>            
        </div>
    </div>
</div>  