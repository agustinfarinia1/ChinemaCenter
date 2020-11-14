<?php 
 include('nav-bar.php');
 require_once("validate-session.php");

 use Controllers\FuncionController as FuncionController;
?>

<div class="container">
    <div class="row">
        <div class="col-3"> <?php // TENDRIAMOS QUE HACER UN FOREACH CON LAS FUNCIONES DE DICHA PELICULA ?>
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
               $diaFuncion = $funcion->getFechaInicio();
               $dias = array("domingo","lunes","martes","miercoles","jueves","viernes","sabado"); 
               $diaSemana = date("w");
               $controller = new FuncionController();
               //SI QUEREMOS MOSTRARLO EN ESPAÑOL FACILMENTE
               while($diaFuncion <= $funcion->getFechaFin()){ 
                    if($controller->comprobarFechaFuncion($funcion,$diaSemana)){ ?>
                        <li class="list-group-item list-group-item-action list-group-item-primary d-flex justify-content-between align-items-center">
                            <?php echo $diaFuncion." ".$dias[$diaSemana]." ".$diaSemana;?>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#comprarEntrada" data-target="#comprarEntrada<?php echo $diaFuncion; ?>">
                                Comprar
                            </button>
                        </li>   
            <?php   }   
                    $diaFuncion = date("Y-m-d",strtotime($diaFuncion."+ 1 days")); 
                    $diaSemana = date("w",strtotime($diaFuncion)); 
                } ?>       
            </ul>            
        </div>
    </div>
</div>  

<form action="<?php echo  FRONT_ROOT."Compra/validarCompra "?>" method="post" >
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
                    <span class="font-weight-bold">Fecha:</span> <?php echo $diaFuncion ?>
                </div>
                <div class="text-center">
                <span class="font-weight-bold">Costo:</span><?php echo $funcion->getNombreCine()?>
                    <input type="hidden" name="cine" value="<?php echo $funcion->getNombreCine() ?>"/>
                </div>
                <div class="text-center">
                <span class="font-weight-bold">Costo:</span><?php echo $funcion->getNombreSala()?>
                    <input type="hidden" name="sala" value="<?php echo $funcion->getNombreSala() ?>"/>
                </div>
                <div class="text-center">
                <span class="font-weight-bold">Costo:</span><?php echo $funcion->getNombrePelicula()?>
                    <input type="hidden" name="pelicula" value="<?php echo $funcion->getNombrePelicula() ?>"/>
                </div> 
                <div class="text-center">
                   <?php $costo= 250; ?>
                    <span class="font-weight-bold">Costo:</span><?php echo ' $ '.$costo?>
                    <input type="hidden" name="costo" value="<?php echo $costo ?>"/>
                </div>
                <div class="form-group">
                <?php // EL LIMITE  DE ENTRADAS A COMPRAR TENDRIA QUE SER EL TOTAL DE LA SALA O VERIFICAR LAS ENTRADAS VENDIDAS ?>
            <label for="nuevo-sala-valor" class="col-form-label text-secondary">Cantidad Entradas:</label>
            <input type="number" name="cantidadEntradas" class="form-control" id="cantidad-entradas" min="0" required>
          </div>
          <div class="form-group">
            <label for="nuevo-sala-valor" class="col-form-label text-secondary">Numero de Tarjeta:</label>
            <input type="number" name="numeroTarjeta" class="form-control" id="cantidad-entradas" min="0" required>
          </div>
          <div class="form-group">
            <label for="nuevo-sala-valor" class="col-form-label text-secondary">Fecha de Vencimiento:</label>
            <input type="month" name="fechaVencimiento" class="form-control" id="cantidad-entradas" required>
          </div>
          <div class="form-group">
            <label for="nuevo-sala-valor" class="col-form-label text-secondary">CVV:</label>
            <input type="number" name="cvv" class="form-control" id="cantidad-entradas" max="999" min="100" required>
          </div>
          
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Comprar</button>
            </div>
        </div>
    </div>
</div>
</form>
    