<?php
    namespace Models;

    class Pelicula // todavia no esta hecho
    {
        private $nombre;
        private $comentario;
        private $foto;
        private $fechaSalida;

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
    }
?>