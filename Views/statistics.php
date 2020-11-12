<?php

include('nav-bar.php');
 require_once("validate-session.php");
?>


<table class="table table-dark table-hover ">
    <thead class="thead-light">

      <tr>
           <th scope="col">Id</th>
           <th scope="col">Fecha Estreno</th>
           <th scope="col">Fecha de Cierre</th>
           <th scope="col">Nombre Pelicula</th>
           <th scope="col">Cine</th>
           <th scope="col">Sala</th>
           <th scope="col">Precio </th>
           <th scope="col">Tickets vendidos</th>
           <th scope="col">Tickets disponibles</th>
    
      </tr>

    </thead>
    
    <tbody>
            <tr>
            <td>11356456</td>
            <td>11/11/2020</td>
            <td>12/1/2020</td>
            <td>Rambo</td>
            <td>Ambassador</td>
            <td>pepe</td>
            <td>245</td>
            <td>2</td>
            <td>98</td>
            </tr>

            <tr>
            <td>34354653</td>
            <td>2/11/2020</td>
            <td>1/1/2020</td>
            <td>Rapunsel</td>
            <td>Aldrey</td>
            <td>pepe</td>
            <td>700</td>
            <td>99</td>
            <td>1</td>
            </tr>

            <tr>
            <td>6664</td>
            <td>1/10/2020</td>
            <td>23/11/2020</td>
            <td>Chinos al ataque</td>
            <td>Ambassador</td>
            <td>pepe</td>
            <td>1000</td>
            <td>100</td>
            <td>0</td>
            </tr>
  </tbody>

  <tbody>
    <?php
          
          foreach ($funcionesList as $funcion):?>
          <tr>
             <td> <?php echo $funcion->getIdFuncion(); ?></td>
             <td> <?php echo $funcion->getFechaInicio(); ?> </td>  
             <td> <?php echo $funcion->getFechaFin(); ?> </td>
             <!-- aca deberia recibir y mostrar en nombre la la pelicula -->

             <td> <?php echo $funcion->getIdPelicula(); ?> </td>
             <td> <?php echo $funcion->getIdSala();?> </td>
               
          </tr>
  

        <?php endforeach; ?>
  </tbody>
    
  
</table>
</div>