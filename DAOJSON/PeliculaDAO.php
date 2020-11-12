<?php
    namespace DAOJSON;

use Models\Pelicula as Pelicula;

class PeliculaDAO 
{
    private $fileName = ROOT."Data/Peliculas.json";
    
    public function getCantidadPaginas($genero = '', $fecha_min = '', $fecha_max = '') {
        $api = file_get_contents("https://api.themoviedb.org/3/movie/now_playing?with_genres=$genero&primary_release_date.gte=$fecha_min&primary_release_date.lte=$fecha_max&api_key=".API_KEY, true);
        $data = json_decode($api);  // Construye un array con el JSON
        return $data->{'total_pages'};  // Devuelve el valor de la key con los resultados por paginas
    }

    public function refresh($generos)
    {
        $arreglo = array();
        $pagina = 1;
        $paginaMax = $this->getCantidadPaginas();
        while($pagina <= $paginaMax){
            
            $url = "https://api.themoviedb.org/3/movie/now_playing?page=$pagina&api_key=".API_KEY;

            $api = file_get_contents($url, true);   // Recibe JSON de la API
            $data = json_decode($api);  // Lo deconstruye en un array

            $data = $data->{"results"};

            foreach($data as $pelicula){    // FALTA DURACION Y GENEROS DE PELICULAS
                $newpelicula = new Pelicula();
                $newpelicula->setId($pelicula->{"id"});
                $newpelicula->setNombre($pelicula->{"title"});
                $newpelicula->setComentario($pelicula->{"overview"});
                $newpelicula->setPoster($pelicula->{"poster_path"});
                $newpelicula->setFoto($pelicula->{"backdrop_path"});
                $newpelicula->setFechaSalida($pelicula->{"release_date"});
                $newpelicula->setDuracion();
                $newpelicula->setGeneros($pelicula->{"genre_ids"});

                array_push($arreglo,$newpelicula);  // problemas con esto 
            }
            $pagina++;
            //sleep(1);
        }
        $this->saveData($arreglo);
    }

    //FALTA ARMAR EL RETRIEVE Y EL SAVE DE LAS PELICULAS E IMPLEMENTAR EL peliculaList

    public function retrieveData()
    {            
        $arreglo = array();

        if(file_exists($this->fileName))
        {
            $jsonToDecode = file_get_contents($this->fileName);

            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
             
            foreach($contentArray as $content)
            {
                $pelicula = new Pelicula();
                $pelicula->setId($content["id_pelicula"]);
                $pelicula->setNombre($content["nombre"]);
                $pelicula->setComentario($content["comentario"]);
                $pelicula->setPoster($content["poster"]);
                $pelicula->setFoto($content["foto"]);
                $pelicula->setFechaSalida($content["fechaSalida"]);
                $pelicula->setDuracion($content["duracion"]);
                $pelicula->setGeneros(json_decode($content["generos"]));

                array_push($arreglo, $pelicula);
            }
        }
        return $arreglo;
    }

    private function saveData($arreglo)
    {
        $arrayToEncode = array();

        foreach($arreglo as $pelicula)
        {
            $valuesArray = array();
            $valuesArray["id_pelicula"] = $pelicula->getId();
            $valuesArray["nombre"] = $pelicula->getNombre();
            $valuesArray["comentario"] = $pelicula->getComentario();
            $valuesArray["poster"] = $pelicula->getPoster();
            $valuesArray["foto"] = $pelicula->getFoto();
            $valuesArray["fechaSalida"] = $pelicula->getFechaSalida();
            $valuesArray["duracion"] = $pelicula->getDuracion();

            $generos = json_encode($pelicula->getGeneros(), JSON_PRETTY_PRINT);

            $valuesArray["generos"] = $generos;
            array_push($arrayToEncode, $valuesArray);
        }

        $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents($this->fileName, $fileContent);
    }

    public function verificarGenero($genero,$arregloGeneros){
        foreach($arregloGeneros as $generoPelicula){
            if($genero == $generoPelicula){
                return true;
            }
        }
        return false;
    }
    public function getByPeliculaId($idPelicula){
        $arreglo = $this->retrieveData();
        foreach($arreglo as $pelicula){
            if($pelicula->getId() == $idPelicula){
                return $pelicula;
            }
        }
        return false;
    }
}
?>