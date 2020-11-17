
<main class="min-vh-100 d-flex align-items-center justify-content-center">

    <form action="<?php echo FRONT_ROOT."User/newPass" ?>" method="post">
        
        <div class="form-group">
            <label for="exampleInputPassword1">Nuevo Password</label>
            <input type="password" name="newpass" class="form-control" id="exampleInputPassword1">
        </div>
        
        <button type="submit" name="token" value="<?php echo $token?>" class="btn btn-primary btn-block">Guardar</button>
    </form>
</main>