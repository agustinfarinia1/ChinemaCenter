<?php 
    include_once('header.php');
?>

<main class="home-login">
<div class="login-form">
    <h2 class="text-primary">ChinemaCenter</h2>
    <form action="<?php echo FRONT_ROOT."Home/Login" ?>" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1"  class="text-secondary">Usuario</label>
            <input type="email" name="userName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="text-secondary">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>       
        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>

        <div class="text-primary my-2">
            <a href="#">Crear cuenta</a> | <a href="#">Recuperar cuenta</a>
        </div>

        <a href="#" class="btn fb btn-block">
          <i class="fa fa-facebook fa-fw"></i> Ingresar con Facebook
        </a>
    </form>
</div>
</main>


