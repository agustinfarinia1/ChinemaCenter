<?php 
 include('nav-bar.php');
 require_once("validate-session.php");
?>

<?php if( $op == 1){ ?>
<div class="row">
    <div class="col-8 offset-2 mt-3">
        <div class="alert alert-danger" role="alert">
            <strong>Advertencia!!</strong> Intenta editar una funcion que superpone a otras
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach($funcionesList as $funcion){ ?>
    <div class="row">
        <div class="col-10 offset-1 mt-3">
            <div class="list-group-item list-group-item-action list-group-item-info">
                <div class="row">
                    <div class="col-3">
                            <a 
                                class="btn btn-primary btn-block"
                                href="<?php echo FRONT_ROOT."Funcion/quitarEstreno/" . $funcion->getIdFuncion() ?>"
                            >
                                Quitar de estrenos
                            </a>
                    </div>
                    <div class="col-7 text-center">
                        <h4>
                            <?php echo $funcion->getNombrePelicula(); ?>
                        </h4>
                    </div>
                    <div class="col-1">
                        <div class="row">
                            <button 
                                class="btn btn-warning btn-block"
                                data-toggle="modal" 
                                data-target="#editFuncion<?php echo $funcion->getIdFuncion(); ?>"
                            >
                                Editar
                            </button>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="row">
                            <button 
                                class="btn btn-danger btn-block"
                                data-toggle="modal" 
                                data-target="#deleteFuncion<?php echo $funcion->getIdFuncion(); ?>"
                            >
                                Eliminar
                            </button>
                        </div>
                    </div>            
                    <div class="col-12 text-center">
                        <strong>Cine:</strong> <?php echo $funcion->getNombreCine();?> | 
                        <strong>Sala:</strong> <?php echo $funcion->getNombreSala();?> | 
                        <strong>Desde:</strong> <?php $desde = date_create_from_format('Y-m-d', $funcion->getFechaInicio()); echo date_format($desde, "d/m/Y"); ?> |
                        <strong>Hasta:</strong> <?php $hasta = date_create_from_format('Y-m-d', $funcion->getFechaFin()); echo date_format($hasta, "d/m/Y"); ?> |
                        <strong>Inicio:</strong> <?php $inicio = date_create_from_format('H:i:s', $funcion->getHoraInicio()); echo date_format($inicio, "H:i"); ?> |
                        <strong>Fin:</strong> <?php $fin = date_create_from_format('H:i:s', $funcion->getHoraFin()); echo date_format($fin, "H:i"); ?>    
                    </div>               
              
                    <div class="col-12 text-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"  <?php if($funcion->getLunes()) echo "checked" ?> disabled>
                            <label class="form-check-label" for="lunes">Lunes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" <?php if($funcion->getMartes()) echo "checked" ?> disabled>
                            <label class="form-check-label" for="martes">Martes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"  <?php if($funcion->getMiercoles()) echo "checked" ?> disabled>
                            <label class="form-check-label" for="miercoles">Miercoles</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" <?php if($funcion->getJueves()) echo "checked" ?> disabled>
                            <label class="form-check-label" for="jueves">Jueves</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"  <?php if($funcion->getViernes()) echo "checked" ?> disabled>
                            <label class="form-check-label" for="viernes">Viernes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"  <?php if($funcion->getSabado()) echo "checked" ?> disabled>
                            <label class="form-check-label" for="sabado">Sabado</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox"  <?php if($funcion->getDomingo()) echo "checked" ?> disabled>
                            <label class="form-check-label" for="domingo">Domingo</label>
                        </div>
                    </div>                                                
                </div>
            </div>
        </div>
    </div>
<?php 
        
        include('funcion-modal-delete.php');
        include('funcion-modal-edit.php');
    } 
?>
