<?php
    namespace Controllers;

    class FuncionController
    {
       

        public function SetSala($idSala)
        {           
            $_SESSION["sala"] = $idSala;
            header("Location:" . FRONT_ROOT . 'Pelicula/Index' );
        }

        public function SetPelicula($idPelicula=0)
        {           
            $_SESSION["idPelicula"] = $idPelicula;            
            require_once(VIEWS_PATH."funcion-add.php");
        }

        public function Add(){

            //llamnar a la api y traer lo que dura la peli

            // calcular la hora de fin de la funcion

            //insertar en la BD

            require_once(VIEWS_PATH."cartelera.php");

        }
   
    }
?>