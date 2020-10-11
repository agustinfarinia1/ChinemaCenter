<?php
    namespace Controllers;


    class PeliculaController
    {       

        public function Index($message = "")
        {            
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."pelicula.php");            
        }
        
    }
?>