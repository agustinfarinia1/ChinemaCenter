<?php

namespace DAODB;

use Models\Pelicula as Pelicula;
use DAODB\Connection as Connection;
use DAODB\QueryType as QueryType;

class PeliculaDAO
{
    private $connection;
    private $fileName = ROOT."Data/Peliculas.json";


    function __construct()
    {

        $this->connection = null;
    }


    /**
     * inserta una peli a la BD en la tabla Peliculas
     *
     * @access public
     * @param  $pelicula con todo sus atributos ya cargados
     * @return rowCount confirma si ingreso la peli
     */
    public function crear($pelicula)
    {

        //aun no esta creada la tabla en la base de datos, VER!!

        $sql = "INSERT INTO Peliculas (id_pelicula,nombre,comentario,poster,foto,fechaSalida,duracion) VALUES (:id_pelicula, :nombre, :comentario, :poster, :foto, :fechaSalida, :duracion)";

        // $pelicula = new Pelicula();
        $parameters['id_pelicula'] = $pelicula->getID_Pelicula();
        $parameters['nombre'] = $pelicula->getNombre();
        $parameters['comentario'] = $pelicula->getComentario();
        $parameters['poster'] = $pelicula->getPoster();
        $parameters['foto'] = $pelicula->getFoto();
        $parameters['fechaSalida'] = $pelicula->getFechaSalida();
        $parameters['duracion'] = $pelicula->getDuracion();

        try {

            $this->connection = Connection::getInstance();

            return $this->connection->ExecuteNonQuery($sql, $parameters);
        } catch (\PDOException $ex) {
            throw $ex;
        }
    }


    /*
   * Esto es lo mismoo que el Read del TP
   */
    public function buscar_por_id($id_Pelicula)
    {

        $sql = "SELECT * FROM Peliculas where id_Pelicula = :id_Pelicula";


        $parameters['id_Pelicula'] = $id_Pelicula;

        try {
            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($sql, $parameters);
        } catch (\Exception $ex) {
            throw $ex;
        }

        if (!empty($resultSet)) {

            return $this->mapear($resultSet);
        } else
            return false;
    }


    protected function mapear($value)
    {
        //si encuentra el dato instanciamelo en un array, sino, devolvemelo vacio
        $value = is_array($value) ? $value : [];

        $resp = array_map(function ($peli) {

            return new Pelicula($peli['id_pelicula'], $peli['nombre'], $peli['comentario'], $peli['poster'], $peli['foto'], $peli['fechaSalida'], $peli['duracion']);
        }, $value);

        return count($resp) > 1 ? $resp : $resp['0'];
    }

    public function readAll()
    {
        $sql = "SELECT * FROM Peliculas";

        try {
            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($sql);
        } catch (\Exception $ex) {

            throw $ex;
        }

        if (!empty($resultSet))
            return $this->mapear($resultSet);
        else
            return false;
    }
    
    public function getMoviesByGenresAndDate($pagina, $genero = '', $fecha_min = '', $fecha_max = '')
    {
        $arregloPeliculas = array();
        if ($pagina <= $this->getCantidadPaginas($genero, $fecha_min, $fecha_max) && $pagina > 0) {
            $url = "https://api.themoviedb.org/3/movie/now_playing?page=$pagina&with_genres=$genero&primary_release_date.gte=$fecha_min&primary_release_date.lte=$fecha_max&api_key=" . API_KEY;

            $api = file_get_contents($url, true);   // Recibe JSON de la API
            $data = json_decode($api);  // Lo deconstruye en un array
            foreach ($data->{'results'} as $pelicula) {
                $movie = new Pelicula();
                $movie->setNombre($pelicula->{'title'});
                $movie->setComentario($pelicula->{'overview'});
                //$movie->setComentarioCorto(substr($movie->getComentario(), 0, 120) . "...");
                $movie->setFoto($pelicula->{'backdrop_path'});
                $movie->setFechaSalida($pelicula->{'release_date'});
                array_push($arregloPeliculas, $movie);   // Guarda cada pelicula de la pagina en el arreglo
            }
        }
        return $arregloPeliculas;   // Si no encuentra nada devuelve array vacio
    }


    public function getCantidadPaginas($genero = '', $fecha_min = '', $fecha_max = '')
    {
        $api = file_get_contents("https://api.themoviedb.org/3/movie/now_playing?with_genres=$genero&primary_release_date.gte=$fecha_min&primary_release_date.lte=$fecha_max&api_key=" . API_KEY, true);
        $data = json_decode($api);  // Construye un array con el JSON
        return $data->{'total_pages'};  // Devuelve el valor de la key con los resultados por paginas
    }

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

    public function add($idPelicula){
        $arreglo = $this->retrieveData();
        foreach($arreglo as $pelicula){
            if($pelicula->getId() == $idPelicula){

                $sql = "INSERT INTO peliculas (id_pelicula,nombre,comentario,poster,foto,fecha_salida,duracion) VALUES (:id_pelicula, :nombre, :comentario, :poster, :foto, :fechaSalida, :duracion)";
                
                $parameters['id_pelicula'] = $pelicula->getID();
                $parameters['nombre'] = $pelicula->getNombre();
                $parameters['comentario'] = $pelicula->getComentario();
                $parameters['poster'] = $pelicula->getPoster();
                $parameters['foto'] = $pelicula->getFoto();
                $parameters['fechaSalida'] = $pelicula->getFechaSalida();
                $parameters['duracion'] = $pelicula->getDuracion();        
                $this->connection = Connection::getInstance();    
                $this->connection->ExecuteNonQuery($sql, $parameters);

                // $query = "CALL SP_PELI_ADD(:idPelicula, :nombre, :comentario, :poster, :foto, :fechaSalida, :duracion)";

                // $parameters["idPelicula"] = $pelicula->getId();
                // $parameters["nombre"] = $pelicula->getNombre();
                // $parameters["comentario"] = $pelicula->getComentario();
                // $parameters["poster"] = $pelicula->getPoster();
                // $parameters["foto"] = $pelicula->getFoto();
                // $parameters["fechaSalida"] = $pelicula->getFechaSalida();
                // $parameters["duracion"] = $pelicula->getDuracion();               
    
                // $this->connection = Connection::GetInstance();
    
                // $this->connection->ExecuteNonQuery($query, $parameters,QueryType::StoredProcedure);
            }
        }
        return false;
    }
}
