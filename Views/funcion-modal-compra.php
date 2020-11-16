<form action="<?php echo  FRONT_ROOT."Compra/validarCompra "?>" method="post" >
<div class="modal fade" id="comprarEntrada<?php echo $diaFuncion; ?>" tabindex="-1" aria-labelledby="comprarEntradaLabel" aria-hidden="true">
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
                    <span class="font-weight-bold">Fecha:</span><?php echo $diaFuncion?>
                        <input type="hidden" name="diaFuncion" value="<?php echo $diaFuncion ?>"/>
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
                <label for="nuevo-sala-valor" class="col-form-label text-secondary">Cantidad Entradas:</label>
            <input type="number" name="cantidadEntradas" class="form-control" id="cantidad-entradas" min="0" required>
            </div>
            <select name="tipoTarjeta">
                <option value="0">Visa</option>
                <option value="1">MasterCard</option>
            </select>
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