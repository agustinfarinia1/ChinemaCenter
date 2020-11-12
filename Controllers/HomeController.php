<?php
    namespace Controllers;

    class HomeController
    {

        public function Index($message = "")
        {             
            if(isset($_SESSION["loggedUser"])){
                if($_SESSION["loggedUser"]->getRol() == 1){
                    header("Location:" . FRONT_ROOT . 'Cine/ShowListView' );
                }else{
                    header("Location:" . FRONT_ROOT . 'Funcion/Cartelera' );
                }
            }

            require_once(VIEWS_PATH."home.php"); 
        }

    }
?>