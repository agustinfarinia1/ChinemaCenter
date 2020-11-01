<?php
    namespace Models;

    class Funcion // todavia no esta hecho
    {
        private $idSala;
        private $idCine;
        private $idPelicula;
        private $fechaHoraInicio;
        private $fechaHoraFin;

        public function getIdSala()
        {
            return $this->idSala;
        }

        public function setIdSala($idSala)
        {
            $this->idSala = $idSala;
        }
        public function getIdCine()
        {
            return $this->idCine;
        }

        public function setIdCine($idCine)
        {
            $this->idCine = $idCine;
        }

        public function getFechaHoraInicio()
        {
            return $this->fechaHoraInicio;
        }

        public function setFechaHoraInicio($fechaHoraInicio)
        {
            $this->fechaHoraInicio = $fechaHoraInicio;
        }

        public function getFechaHoraFin()
        {
            return $this->fechaHoraFin;
        }

        public function setFechaHoraFin($fechaHoraFin)
        {
            $this->fechaHoraFin = $fechaHoraFin;
        }

        public function getIdPelicula()
        {
            return $this->idPelicula;
        }

        public function setIdPelicula($idPelicula)
        {
            $this->idPelicula = $idPelicula;
        }
    }
?>