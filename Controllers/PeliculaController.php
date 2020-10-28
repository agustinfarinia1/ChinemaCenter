<?php
    namespace Controllers;

use DAO\GeneroDao;
use DAO\PeliculaDAO;
      

class PeliculaController
    {       
        private $generoDAO;
        private $peliculas;
        private $generos;
        private $PeliculaDAO;

        public function __construct()
        {
            $this->generoDAO = new GeneroDao();
            $this->PeliculaDAO = new PeliculaDAO();            
        } 

        public function Index($genero ="",$fecha_min="",$fecha_max="",$pagina = 1,$message = "")
        {            
            require_once(VIEWS_PATH."validate-session.php");
            $this->generos = $this->generoDAO->getAllGenres();
            $this->peliculas = $this->getPeliculasPorGenero($genero,$fecha_min,$fecha_max,$pagina);
            require_once(VIEWS_PATH."pelicula-list.php");
        }

        public function getPeliculasPorGenero($genero ="",$fecha_min="",$fecha_max="",$pagina = 1)  // Necesita la pagina , puede tener filtros por genero por genero y fechas
        {
            echo $genero;
            return $this->PeliculaDAO->getMoviesByGenresAndDate($pagina,$genero,$fecha_min,$fecha_max);
        }

        public function cartelera(){
            require_once(VIEWS_PATH."pelicula-cartelera.php");
        }

    }
?>