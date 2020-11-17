<?php
    namespace Models;

    class Funcion // todavia no esta hecho
    {
        private $idFuncion;
        private $idSala;
        private $idPelicula;
        private $fechaInicio;
        private $fechaFin;
        private $horaInicio;
        private $horaFin;
        private $lunes;
        private $martes;
        private $miercoles;
        private $jueves;
        private $viernes;
        private $sabado;
        private $domingo;
        private $estreno;
        private $nombreCine;
        private $nombreSala;
        private $nombrePelicula;
        private $foto;
        private $poster;
        private $comentario;
        private $capacidadSala;
        private $entradasVendidas;

        public function getIdFuncion()
        {
            return $this->idFuncion;
        }

        public function setIdFuncion($idFuncion)
        {
            $this->idFuncion = $idFuncion;
        }

        public function getIdSala()
        {
            return $this->idSala;
        }

        public function setIdSala($idSala)
        {
            $this->idSala = $idSala;
        } 
        
        public function getIdPelicula()
        {
            return $this->idPelicula;
        }

        public function setIdPelicula($idPelicula)
        {
            $this->idPelicula = $idPelicula;
        }

        public function getFechaInicio()
        {
            return $this->fechaInicio;
        }

        public function setFechaInicio($fechaInicio)
        {
            $this->fechaInicio = $fechaInicio;
        }

        public function getFechaFin()
        {
            return $this->fechaFin;
        }

        public function setFechaFin($fechaFin)
        {
            $this->fechaFin = $fechaFin;
        }

        public function getHoraInicio()
        {
            return $this->horaInicio;
        }

        public function setHoraInicio($horaInicio)
        {
            $this->horaInicio = $horaInicio;
        }

        public function getHoraFin()
        {
            return $this->horaFin;
        }

        public function setHoraFin($horaFin)
        {           
            $this->horaFin = $horaFin;
        }

        public function calcularHoraFin($duracion = 120)
        {           
            $this->horaFin = date("H:i",strtotime($this->getHoraInicio()."+". $duracion ."minutes"));
        }

        public function getLunes()
        {
            return $this->lunes;
        }

        public function setLunes($lunes)
        {
            $this->lunes = $lunes;
        }

        public function getMartes()
        {
            return $this->martes;
        }

        public function setMartes($martes)
        {
            $this->martes = $martes;
        }

        public function getMiercoles()
        {
            return $this->miercoles;
        }

        public function setMiercoles($miercoles)
        {
            $this->miercoles = $miercoles;
        }

        public function getJueves()
        {
            return $this->jueves;
        }

        public function setJueves($jueves)
        {
            $this->jueves = $jueves;
        }

        public function getViernes()
        {
            return $this->viernes;
        }

        public function setViernes($viernes)
        {
            $this->viernes = $viernes;
        }

        public function getSabado()
        {
            return $this->sabado;
        }

        public function setSabado($sabado)
        {
            $this->sabado = $sabado;
        }

        public function getDomingo()
        {
            return $this->domingo;
        }

        public function setDomingo($domingo)
        {
            $this->domingo = $domingo;
        }

        public function getEstreno()
        {
            return $this->estreno;
        }

        public function setEstreno($estreno)
        {
            $this->estreno = $estreno;
        }

        public function getNombreCine()
        {
            return $this->nombreCine;
        }

        public function setNombreCine($nombreCine)
        {
            $this->nombreCine = $nombreCine;
        }

        public function getNombreSala()
        {
            return $this->nombreSala;
        }

        public function setNombreSala($nombreSala)
        {
            $this->nombreSala = $nombreSala;
        }

        public function getNombrePelicula()
        {
            return $this->nombrePelicula;
        }

        public function setNombrePelicula($nombrePelicula)
        {
            $this->nombrePelicula = $nombrePelicula;
        }

        public function getFoto()
        {
            return $this->foto;
        }

        public function setFoto($foto)
        {
            $this->foto = $foto;
        }

        public function getPoster()
        {
            return $this->poster;
        }

        public function setPoster($poster)
        {
            $this->poster = $poster;
        }

        public function getComentario()
        {
            return $this->comentario;
        }

        public function setComentario($comentario)
        {
            $this->comentario = $comentario;
        }

        public function getCapacidadSala()
        {
            return $this->capacidadSala;
        }

        public function setCapacidadSala($capacidadSala)
        {
            $this->capacidadSala = $capacidadSala;
        }

        public function getEntradasVendidas()
        {
            return $this->entradasVendidas;
        }

        public function setEntradasVendidas($entradasVendidas)
        {
            $this->entradasVendidas = $entradasVendidas;
        }

    }
?>