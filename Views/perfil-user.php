<?php
include('nav-bar.php');
require_once("validate-session.php");
?>


<main class="min-vh-100 d-flex align-items-center justify-content-center">

    <div class="card border-primary text-center mb-3" style="width: 350px;">
        <div class="text-center">
            <img class="card-img-top" src="<?php echo IMG_PATH . "User-Logo.png" ?>" style="width: 120px" alt="imagen-perfil">
        </div>

        <div class="card-header text-primary">
            Mi informacion Personal
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item text-primary "><?php echo $_SESSION["loggedUser"]->getName() ?></li>
            <li class="list-group-item text-primary"><?php echo $_SESSION["loggedUser"]->getLastname() ?></li>
            <li class="list-group-item text-primary"><?php echo $_SESSION["loggedUser"]->getEmail() ?></li>
        </ul>

        <div class="card-body">

            <a href="#" role="" class="btn btn-outline-primary " data-toggle="modal" data-target="#editarPerfil">Editar Perfil</a>
            <a href="#" role="button" class="btn btn-outline-primary ">Compras</a>
        </div>
    </div>

</main>

<div class="modal fade " id="editarPerfil" tabindex="-1" aria-labelledby="newSalaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="newSalaModalLabel">Edita tu Informacion <?php echo $_SESSION["loggedUser"]->getName(); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?php echo  FRONT_ROOT . "User/updateUser " ?>" method="post">
                <div class="modal-body">
                <div class="form-group">
                        
                        <input type="hidden" value="<?php echo $_SESSION["loggedUser"]->getEmail() ?>" name="email" class="form-control" id="user-email" required>
                    </div>
                    <div class="form-group">
                        <label for="user-nombre" class="col-form-label text-secondary">Nombre:</label>
                        <input type="text" value="<?php echo $_SESSION["loggedUser"]->getName() ?>" name="name" class="form-control" id="user-nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="user-apellido" class="col-form-label text-secondary">Apellido:</label>
                        <input type="text" name="lastname" value=<?php echo $_SESSION["loggedUser"]->getLastname(); ?> class="form-control" id="user-apellido" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="user-contraseña" class="col-form-label text-secondary">Contraseña:</label>
                        <input type="password" name="password" value=<?php echo $_SESSION["loggedUser"]->getPassword(); ?> class="form-control" id="user-contraseña" min="0" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success ">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

























