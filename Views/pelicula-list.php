<?php 
 include('nav-bar.php');
 require_once("validate-session.php");


use Controllers\PeliculaController as PeliculaController;


$pelicula = new PeliculaController();

echo "<pre>";
var_dump($pelicula->getPeliculasPorGenero(1,53,"2020-01-10","2020-10-10"));   // Puede buscar por genero solo o por genero y
echo "</pre>";

?>