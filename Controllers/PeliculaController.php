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
        private $peliculas;
        private $generos;
        private $pagina;
        private $PeliculaDAO;

        public function __construct()
        {
            $this->generoDAO = new GeneroDao();
            $this->PeliculaDAO = new PeliculaDAO();     
            $this->peliculas = $this->cargarArregloPeliculas();     
        } 

        public function Index($genero =28,$fecha_min="",$fecha_max="",$pagina = 1,$message = "")
        {            
            require_once(VIEWS_PATH."validate-session.php");
            $this->generos = $this->generoDAO->getAllGenres();
            if($this->peliculas){
                $this->refresh();
                $this->peliculas = $this->cargarArregloPeliculas();
            }
            $this->pagina = $this->mostrarPagina($genero,$pagina,$fecha_min,$fecha_max);
            require_once(VIEWS_PATH."pelicula-list.php");
        }
        
        public function refresh(){
            $this->PeliculaDAO->refresh($this->generoDAO->getAllGenres());
        }

        public function cargarArregloPeliculas(){
            return $this->PeliculaDAO->retrieveData();
        }

        public function getPeliculasPorGenero($genero=28,$fecha_min="",$fecha_max="")
        {
            $arreglo = array();
            foreach($this->peliculas as $pelicula){
                if(array_search($genero,$pelicula->getGeneros())){      // Los filtros por fecha fallan, tendria que hacerlo 1 x 1
                    if($fecha_min && $fecha_max){
                        if($fecha_min <= $pelicula->getFechaSalida() && $fecha_max >= $pelicula->getFechaSalida()){
                        }
                    }
                    else{
                        array_push($arreglo,$pelicula);
                    }
                }
            }
            return $arreglo;
        }       

        public function mostrarPagina($genero=28,$pagina,$fecha_min="",$fecha_max=""){    // falta confirmacion de pagina
            $arreglo = $this->getPeliculasPorGenero($genero,$fecha_min,$fecha_max);
            $flag = 0;
            $largoPagina = 19;
            if(sizeof($arreglo) < 20)
            {
                if($pagina == 1){
                    $flag = 1;
                    $largoPagina = sizeof($arreglo) - 1;
                }
            }
            else{
                if($pagina <= sizeof($arreglo) / 20){
                    $flag = 1;
                }
            }

            if($flag == 1){
                if($pagina == 1){
                    if($pagina != 1){
                        $fin = ($pagina * $largoPagina) + 1;
                        $inicio = ($fin - $largoPagina);
                    }
                    else{
                        $fin = ($pagina * $largoPagina);
                        $inicio = $fin - $largoPagina;
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
                else{
                    echo "su pagina es mayor a la cantidad de peliculas de dicho genero";
                    return null;
                }
            }
        }
    }
?>