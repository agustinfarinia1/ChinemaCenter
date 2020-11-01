<?php
    namespace Models;

    class Sala
    {
        private $id;
        private $idCine;
        private $nombre;
        private $capacidad;
        private $direccion;
        private $precio;
    
        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getIdCine()
        {
            return $this->idCine;
        }

        public function setIdCine($id)
        {
            $this->idCine = $id;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function getCapacidad()
        {
            return $this->capacidad;
        }

        public function setCapacidad($capacidad)
        {
            $this->capacidad = $capacidad;
        }

        public function getPrecio()
        {
            return $this->precio;
        }

        public function setPrecio($precio)
        {
            $this->precio = $precio;
        }
    }
?>