<?php 
 include('nav-bar.php');
 require_once("validate-session.php");
?>
<div class="row">
    <div class="col-8">
        <h2 class="text-primary text-center">Cines</h2>
    </div>
    <div class="col-4">
        <button 
            class="btn btn-primary btn-block"
            data-toggle="modal" 
            data-target="#newCine"
        >Nuevo Cine</button> 
    </div>
</div>

<main class="min-vh-75 d-flex justify-content-center align-items-center">

    <div class="w-75">
        <div class="accordion" id="accordionExample">

            <?php 
                foreach($cineList as $cine){
            ?>

                <div class="card">
                    <div class="card-header bg-dark" id="headingOne">
                        <div class="d-flex justify-content-between mb-0">
                        
                            <button 
                                class="btn btn-outline-primary"
                                data-toggle="modal" 
                                data-target="#newSala<?php echo $cine->getId(); ?>"
                            >
                                Agregar sala
                            </button>
                        
                        
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $cine->getId(); ?>" aria-expanded="true" aria-controls="collapseOne">
                                Cine: <span class="text-uppercase font-weight-bold text-monospace"><?php echo $cine->getNombre(); ?></span>
                            </button>
                                                     
                            <span>
                                <button 
                                    class="btn btn-outline-warning"
                                    data-toggle="modal" 
                                    data-target="#editCine<?php echo $cine->getId(); ?>"
                                >Editar</button>
                                <button 
                                    class="btn btn-outline-danger"
                                    data-toggle="modal" 
                                    data-target="#deleteCine<?php echo $cine->getId(); ?>"
                                >Eliminar</button>
                            </span>                            
                            
                                                       
                        </div>
                    </div>
              
                    <div id="collapse<?php echo $cine->getId(); ?>" class="collapse bg-secondary" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                <!-- <div class="col-2 d-flex align-items-center">
                                    <div class="btn-group-vertical btn-group-toggle" role="group" aria-label="Button group with nested dropdown">
                                        <button type="button" class="btn btn-dark btn-block">Sala 1</button>
                                        <button type="button" class="btn btn-dark btn-block">Sala 2</button>
                                        <button type="button" class="btn btn-dark btn-block">Sala 3</button>
                                        <button type="button" class="btn btn-dark btn-block">Sala 4</button>
                                    </div>
                                </div> -->
                                <div class="col-12">
                                    <?php 
                                        foreach($salaList as $sala){
                                            if($cine->getId() == $sala->getIdCine()){
                                    ?>
                                    <div class="d-flex justify-content-between align-items-center alert alert-info">
                                        <a 
                                            class="btn btn-outline-primary"
                                            href="<?php echo  FRONT_ROOT."Funcion/SetSala/".$sala->getIdCine() ?>"
                                        >Nueva Pelicula</a>
                                        <span>
                                            Sala: <span class="text-uppercase font-weight-bold text-monospace"><?php echo $sala->getNombre(); ?></span> 
                                        </span>
                                        <span>
                                            Butacas: <span class="text-uppercase font-weight-bold text-monospace"><?php echo $sala->getCapacidad(); ?></span> 
                                        </span>
                                        <span> 
                                            Precio: <span class="text-uppercase font-weight-bold text-monospace"><?php echo $sala->getPrecio(); ?></span> 
                                        </span>
                                        <span>                                           
                                            <button 
                                                class="btn btn-outline-warning"
                                                data-toggle="modal" 
                                                data-target="#editSala<?php echo $sala->getId(); ?>"
                                            >Editar</button>
                                            <button 
                                                class="btn btn-outline-danger"
                                                data-toggle="modal" 
                                                data-target="#deleteSala<?php echo $sala->getId(); ?>"
                                            >Eliminar</button>
                                        </span>      
                                    </div>
                                    <?php
                                               include('sala-modal-edit.php');
                                               include('sala-modal-delete.php');
                                            }// fin del if
                                        }// fin del foreach
                                    ?>
                                    <!--///////////////////////////////////////-->
                                    <!-- <table class="table table-dark table-hover">
                                        <thead>
                                          <tr>
                                            <th scope="col">Peliulas</th>
                                            <th scope="col">Inicio</th>
                                            <th scope="col">Fin</th>
                                            <th scope="col" colspan="2">
                                                <button class="btn btn-outline-primary btn-block">
                                                    Nuea pelicula
                                                </button> 
                                            </th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">JLA</th>
                                            <td>20:00</td>
                                            <td>23:30</td>
                                            <td>
                                                <button class="btn btn-outline-warning btn-block">
                                                    Edit
                                                </button>                                               
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-danger btn-block">
                                                    Eliminar
                                                </button>
                                            </td>
                                          </tr>
                                          <tr>
                                            <th scope="row">El Rey Leon</th>
                                            <td>15:00</td>
                                            <td>17:00</td>
                                            <td>
                                                <button class="btn btn-outline-warning btn-block">
                                                    Edit
                                                </button>                                               
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-danger btn-block">
                                                    Eliminar
                                                </button>
                                            </td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Tenet</th>
                                            <td>18:15</td>
                                            <td>20:50</td>
                                            <td>
                                                <button class="btn btn-outline-warning btn-block">
                                                    Edit
                                                </button>                                               
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-danger btn-block">
                                                    Eliminar
                                                </button>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table> -->
                                      <!--///////////////////////////////////////-->

                                </div>

                            </div>
                            
                        </div>
                        <!-- fin card-body -->
                    </div>
                </div><!-- fin card -->


            <?php
                }
            ?>

        </div><!-- Fin de acordion -->
    </div>

   

</main>



<?php 
    include('cine-modal-new.php');
    foreach($cineList as $cine){
        include('cine-modal-edit.php');
        include('cine-modal-delete.php');
        include('sala-modal-new.php');
    }
?>