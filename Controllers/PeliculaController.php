<?php
    namespace Controllers;

use DAO\GeneroDao;
use DAO\PeliculaDAO;
      

class PeliculaController
    {       
        private $generos;
        private $dao;

        public function __construct()
        {
            $this->generos = new GeneroDao();
            $this->dao = new PeliculaDAO();
            
        }        


        public function Index($message = "")
        {            
            require_once(VIEWS_PATH."validate-session.php");
            $generoslist = $this->generos->getAllGenres();
            require_once(VIEWS_PATH."pelicula-list.php");
            
            
        }

        public function getPeliculasPorGenero($pagina,$genero ="",$fecha_min="",$fecha_max="")  // Necesita la pagina , puede tener filtros por genero por genero y fechas
        {
            return $this->dao->getMoviesByGenresAndDate($pagina,$genero,$fecha_min,$fecha_max);
        }
    }
?>