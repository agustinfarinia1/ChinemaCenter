<?php
    namespace Models;

    class Pelicula 
    {
        private $id_pelicula;
        private $nombre;
        private $comentario;
        private $poster;
        private $foto;
        private $fechaSalida;
        private $duracion;
        private array $generos;

        public function __construct($id_pelicula = '', $nombre = '', $comentario = '', $poster = '', $foto = '',$fechaSalida = '', $duracion = '')
    {

        $this->id_pelicula = $id_pelicula;
        $this->nombre = $nombre;
        $this->comentario = $comentario;
        $this->poster = $poster;
        $this->foto = $foto;
        $this->fechaSalida = $fechaSalida;
        $this->duracion = $duracion;
    }

        public function getId()
        {
            return $this->id_pelicula;
        }
    
        public function setId($id_pelicula)
        {
            $this->id_pelicula= $id_pelicula;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function getComentario()
        {
            return $this->comentario;
        }

        public function setComentario($comentario)
        {
            $this->comentario = $comentario;
        }

        public function getPoster()
        {
            return $this->poster;
        }

        public function setPoster($poster)
        {
            $this->poster = $poster;
        }

        public function getFoto()
        {
            return $this->foto;
        }

        public function setFoto($foto)
        {
            $this->foto = $foto;
        }

        public function getFechaSalida()
        {
            return $this->fechaSalida;
        }

        public function setFechaSalida($fechaSalida)
        {
            $this->fechaSalida = $fechaSalida;
        }

        public function getDuracion()
        {
            return $this->duracion;
        }

        public function setDuracion()
        {
            $this->duracion = 200;
            
            /*  try{
                $api = file_get_contents('https://api.themoviedb.org/3/movie/'.$idPelicula.'?api_key='.API_KEY, true);
                $data = json_decode($api);
                $this->duracion = ($data->{'runtime'} > 0) ? $data->{'runtime'} : 150 ;
            }
            catch(Exception $e){
                echo $e;
            } */

        }

        public function setGeneros($generos)
        {
            $this->generos = $generos;
        }

        public function getGeneros()
        {
            return $this->generos;
        }
    }
?>