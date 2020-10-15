<?php
    namespace Controllers;

use DAO\GeneroDao;

class PeliculaController
    {       
        private $generos;

        public function __construct()
        {
            $this->generos = new GeneroDao();
            
        }

        public function Index($message = "")
        {            
            require_once(VIEWS_PATH."validate-session.php");
            $generoslist = $this->generos->getAllGenres();
            require_once(VIEWS_PATH."pelicula-list.php");
            
            
        }
        
    }
?>