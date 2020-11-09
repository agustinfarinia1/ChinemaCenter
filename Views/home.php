<?php 
    include_once('header.php');

?>

<main class="home-login">
<div class="login-form">
    <h2 class="text-primary">ChinemaCenter</h2>
    <form action="<?php echo FRONT_ROOT."User/Login" ?>" method="post">
        <div class="form-group">
            <label for="inputEmail1"  class="text-secondary">Usuario</label>
            <input type="email" name="userName" class="form-control" id="inputEmail1" aria-describedby="emailHelp" required>            
        </div>
        <div class="form-group">
            <label for="inputPassword" class="text-secondary">Password</label>
            <input type="password" name="password" class="form-control" id="i
            nputPassword" required>
        </div>       
        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>

        <div class="text-primary my-2">
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#userRegistrar">
                Crear cuenta
            </button> 
            | 
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#userRecuperarPass">
                Recuperar cuenta
            </button>
        </div>

       

        <a href="#" class="btn fb btn-block">
          <i class="fa fa-facebook fa-fw"></i> Ingresar con Facebook
        </a>
    </form>
</div>
</main>

<?php
    include('user-registrar.php');
    include('user-recuperar-pass.php');
?>


