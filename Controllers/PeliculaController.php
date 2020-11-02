<?php
    namespace Controllers;


use DAOJSON\GeneroDao as GeneroDAO;
use DAOJSON\PeliculaDAO as PeliculaDAO;
// use DAOJSON\GeneroDao;
// use DAODB\PeliculaDAO;
// use Models\Pelicula;

      

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

        public function crear_pelicula ($id_pelicula, $nombre, $comentario, $poster, $foto, $fechaSalida, $duracion)
        {
            $peli = new Pelicula($id_pelicula , $nombre , $comentario , $poster , $foto ,$fechaSalida , $duracion );
            $this->PeliculaDAO->crear($peli);

        }

        public function mostrar_Todas(){

            $list = $this->PeliculaDAO->readAll();
    
            if($list == false)
            {
                $list = [];
            }
            
            return $list;
        }
        
        public function leer_una($id){
    
            return $movie = $this->PeliculaDAO->buscar_por_id($id);
        }
    
    }
?>