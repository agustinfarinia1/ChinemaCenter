<?php
    namespace Controllers;

    use DAO\PeliculaDAO;
      
    class PeliculaController
    {
        private $dao;

        function __construct()
        {
            $dao = new PeliculaDAO();
        }
        public function Index($message = "")
        {            
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."pelicula-list.php");            
        }

        public function getPeliculasPorGenero($pagina = 1,$genero ="",$fecha_min="",$fecha_max="")  // Necesita la pagina , puede tener filtros por genero por genero y fechas
        {
            return $this->dao->getMoviesByGenresAndDate($pagina,$genero,$fecha_min,$fecha_max);
        }
    }
?>