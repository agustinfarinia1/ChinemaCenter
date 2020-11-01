<?php
    namespace DAOJSON;

use Models\Pelicula as Pelicula;

class PeliculaDAO 
{
    public function getMoviesByGenresAndDate($pagina,$genero = '', $fecha_min = '', $fecha_max = '')
    {
        $arregloPeliculas = array();
        if($pagina <= $this->getCantidadPaginas($genero,$fecha_min,$fecha_max) && $pagina > 0)
        {      
            $url = "https://api.themoviedb.org/3/movie/now_playing?page=$pagina&with_genres=$genero&primary_release_date.gte=$fecha_min&primary_release_date.lte=$fecha_max&api_key=".API_KEY;

            $api = file_get_contents($url, true);   // Recibe JSON de la API
            $data = json_decode($api);  // Lo deconstruye en un array
            foreach($data->{'results'} as $pelicula){
                $movie = new Pelicula();
                $movie->setId($pelicula->{'id'});
                $movie->setNombre($pelicula->{'title'});
                $movie->setComentario($pelicula->{'overview'});
                // $movie->setComentarioCorto(substr($movie->getComentario(),0,120)."...");
                $movie->setFoto($pelicula->{'backdrop_path'});
                $movie->setFechaSalida($pelicula->{'release_date'});
                array_push($arregloPeliculas,$movie);   // Guarda cada pelicula de la pagina en el arreglo
            }
        }
        return $arregloPeliculas;   // Si no encuentra nada devuelve array vacio
    }

    
    public function getCantidadPaginas($genero = '', $fecha_min = '', $fecha_max = '') {
        $api = file_get_contents("https://api.themoviedb.org/3/movie/now_playing?with_genres=$genero&primary_release_date.gte=$fecha_min&primary_release_date.lte=$fecha_max&api_key=".API_KEY, true);
        $data = json_decode($api);  // Construye un array con el JSON
        return $data->{'total_pages'};  // Devuelve el valor de la key con los resultados por paginas
    }
}
?>