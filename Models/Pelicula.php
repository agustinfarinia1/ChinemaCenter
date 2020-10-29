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
            return $this->Poster;
        }

        public function setPoster($Poster)
        {
            $this->Poster = $Poster;
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

        public function getID_Pelicula()
        {
            return $this->id_pelicula;
        }

        public function setID_Pelicula($id_pelicula)
        {
            $this->id_pelicula = $id_pelicula;
        }

        public function getDuracion()
        {
            return $this->nombre;
        }

        public function setDuracion($duracion)
        {
            $this->duracion = $duracion;
        }
    }
?>