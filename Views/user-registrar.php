
<!-- Modal -->
<div class="modal fade" id="userRegistrar" tabindex="-1" aria-labelledby="userRegistrarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="userRegistrarLabel">Nueva cuenta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form>            
                <div class="modal-body">   
                    <div class="form-group row">
                        <label for="inputNombre" class="col-sm-2 col-form-label text-primary">Nombre:</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNombre">
                        </div>
                    </div>               
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label text-primary">Email:</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" autocomplete="off">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label text-primary">Password:</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear cuenta</button>
                </div>         
                
            </form>

        </div>
    </div>
</div>