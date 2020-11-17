<div 
    class="modal fade" 
    id="editFuncion<?php echo $funcion->getIdFuncion(); ?>" 
    tabindex="-1" 
    aria-labelledby="editFuncionModalLabel<?php echo $funcion->getIdFuncion() ?>" 
    aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-primary" id="editFuncionModalLabel<?php echo $funcion->getIdFuncion() ?>">Funcion</h5>        
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form action="<?php echo FRONT_ROOT."Funcion/edit"?>" method="POST" class="p-3">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label text-primary">Fecha de Inicio</label>
                <div class="col-sm-8">
                    <input 
                        type="date" 
                        class="form-control"
                        name="editFechaInicio" 
                        value="<?php echo $funcion->getFechaInicio(); ?>"  
                        min="<?php echo date("Y-m-d"); ?>"
                    >     
                </div>                        
            </div>

            <hr class="border-bottom" />

            <div class="form-group row">
                <label for="editFechaFin"  class=" col-sm-4 col-form-label text-primary">Fecha de fin</label>
                <div class="col-sm-8">
                <input 
                        type="date" 
                        class="form-control"
                        name="editFechaFin"
                        value="<?php echo $funcion->getFechaFin(); ?>"  
                        min="<?php echo date("Y-m-d"); ?>"
                    >        
                </div>                     
            </div>

            <hr class="border-bottom" />

            <div class="form-group row">
                <label for="editHora"  class=" col-sm-4 col-form-label text-primary">Hora</label>
                <div class="col-sm-8">
                    <input 
                        type="time" 
                        class="form-control"
                        name="editHora" 
                      
                        value="<?php echo $funcion->getHoraInicio(); ?>"  
                    > 
                </div>               
            </div>

            <div class="form-group row d-none">
                <label for="ediIdFuncion"  class=" col-sm-4 col-form-label text-primary">ID</label>
                <div class="col-sm-8">
                <input 
                    type="num" 
                    class="form-control"
                    name="ediIdFuncion" 
                  
                    value="<?php echo $funcion->getIdFuncion(); ?>" 
                >        
                </div>                     
            </div>

            <hr class="border-bottom" />
           
            <div class="row d-flex justify-content-center text-primary">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="lunes" value="lunes" <?php if($funcion->getLunes()) echo "checked" ?>>
                    <label class="form-check-label" for="editLunes">Lunes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="martes" value="martes" <?php if($funcion->getMartes()) echo "checked" ?>>
                    <label class="form-check-label" for="editMartes">Martes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="miercoles" value="miercoles" <?php if($funcion->getMiercoles()) echo "checked" ?>>
                    <label class="form-check-label" for="editMiercoles">Miercoles</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="jueves" value="jueves" <?php if($funcion->getJueves()) echo "checked" ?>>
                    <label class="form-check-label" for="editJueves">Jueves</label>
                </div>
            </div>
            <div class="row d-flex justify-content-center mb-2 text-primary">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="viernes" value="viernes" <?php if($funcion->getViernes()) echo "checked" ?>>
                    <label class="form-check-label" for="editViernes">Viernes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="sabado" value="sabado" <?php if($funcion->getSabado()) echo "checked" ?>>
                    <label class="form-check-label" for="editSabado">Sabado</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="domingo" value="domingo" <?php if($funcion->getDomingo()) echo "checked" ?>>
                    <label class="form-check-label" for="editDomingo">Domingo</label>
                </div>               
            </div>

            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button 
                    type="submit" 
                    class="btn btn-warning"                  
                >Editar Funcion</button>
            </div>
        </from>   
    </div>
  </div>
</div>