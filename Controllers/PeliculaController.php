<?php
    namespace Controllers;


use DAOJSON\GeneroDao as GeneroDAO;
use DAOJSON\PeliculaDAO as PeliculaDAO;
// use DAOJSON\GeneroDao;
// use DAODB\PeliculaDAO;
 use Models\Pelicula;

      

class PeliculaController
    {       
        private $generoDAO;
        private $peliculas; // todas las peliculas del json
        private $generos;   // todos los generos de la api
        private $PeliculaDAO;
        private $contenidoPagina;    // pagina actual
        private $paginaMax; // total de paginas por busqueda

        public function __construct($genero = 28)
        {
            $this->generoDAO = new GeneroDao();
            $this->PeliculaDAO = new PeliculaDAO();     
            $this->peliculas = $this->cargarArregloPeliculas();     
        } 

        public function Index($generoBusqueda =28,$fecha_min='',$fecha_max='',$pagina = 1,$message = "")
        {

            if($fecha_min == '2000-01-01'){
                $fecha_min = '';
            }
            if($fecha_max == '2000-01-01'){
                $fecha_max = '';
            }
            require_once(VIEWS_PATH."validate-session.php");
            $this->generos = $this->generoDAO->getAllGenres();
            if($this->cargarArregloPeliculas($generoBusqueda)){
                $this->peliculas = $this->cargarArregloPeliculas($generoBusqueda);
            }
            else{
                $this->refresh();
                $this->peliculas = $this->cargarArregloPeliculas($generoBusqueda);
            }
            $this->paginaMax = $this->cantidadPaginas($generoBusqueda,$fecha_min,$fecha_max);
            $this->contenidoPagina = $this->mostrarPagina($generoBusqueda,$pagina,$fecha_min,$fecha_max);
            require_once(VIEWS_PATH."pelicula-list.php");
        }
        
        public function refresh(){
            $this->PeliculaDAO->refresh($this->generoDAO->getAllGenres());
            $this->Index();
        }

        public function cargarArregloPeliculas(){
            return $this->PeliculaDAO->retrieveData();
        }

        public function getPeliculasPorGenero($genero,$fecha_min,$fecha_max)
        {
            $arreglo = array();
            foreach($this->peliculas as $pelicula){
                if($this->PeliculaDAO->verificarGenero($genero,$pelicula->getGeneros())){      // Los filtros por fecha fallan, tendria que hacerlo 1 x 1
                    if($fecha_min || $fecha_max){
                        if($fecha_min){
                            if($fecha_max){
                                if($fecha_max > $fecha_min){
                                    if($fecha_min <= $pelicula->getFechaSalida() && $fecha_max >= $pelicula->getFechaSalida()){
                                        array_push($arreglo,$pelicula);
                                    }
                                }
                            }
                            else{
                                if($fecha_min <= $pelicula->getFechaSalida()){
                                    array_push($arreglo,$pelicula);
                                }
                            }
                        }
                        else{
                            if($fecha_max){
                                if($fecha_max >= $pelicula->getFechaSalida()){
                                    array_push($arreglo,$pelicula);
                                }
                            }
                        }
                    }
                    else{
                        array_push($arreglo,$pelicula);
                    }
                }
            }
            return $arreglo;
        }       

        public function mostrarPagina($genero,$pagina,$fecha_min="",$fecha_max=""){    // falta confirmacion de pagina
            $arreglo = $this->getPeliculasPorGenero($genero,$fecha_min,$fecha_max); // trae un arreglo con las peliculas del genero
            $flag = 0;
            $largoPagina = 20;
            if($pagina >= 1 && $pagina <= $this->paginaMax){
                if(sizeof($arreglo) - 1 < 20)
                {
                    if($pagina == 1){
                        $flag = 1;
                        $inicio = 0;
                        $fin = sizeof($arreglo) - 1;
                    }
                }
                else{
                    if($pagina <= ceil(sizeof($arreglo)) / 20){
                        $flag = 1;
                        if($pagina == 1){
                            $largoPagina = 19;
                        }
                    }
                    else{
                        $flag = 1;
                        $inicio = ($pagina -1) * $largoPagina;
                        $fin = sizeof($arreglo) - 1;
                    }
                }
    
                if($flag == 1){
                    if($pagina != $this->paginaMax)
                    {
                        $fin = ($pagina * $largoPagina);
                        $inicio = ($fin - $largoPagina);
                        if($fin > 20)
                        {
                            $fin--;
                        }
                    }
                    $newarreglo = array();
                    $i = $inicio;
        
                    while($i <= $fin){
                        if($i >= $inicio && $i <= $fin){
                            array_push($newarreglo,$arreglo[$i]);
                        }
                        $i++;
                    }
    
                    return $newarreglo;
                }
            }
            else{
                if($pagina > $this->paginaMax){
                    echo "su pagina es mayor a la cantidad de peliculas de dicho genero";
                }
                if($pagina <= 0){
                    echo "su pagina es menor que 0";
                }
                return null;
            }
        }

        public function cantidadPaginas($genero,$fecha_min,$fecha_max){
            return ceil(count($this->getPeliculasPorGenero($genero,$fecha_min,$fecha_max)) / 20);
        }
    }
?>