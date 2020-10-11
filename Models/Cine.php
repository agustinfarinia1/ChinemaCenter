<?php
    namespace Models;

    class Cine
    {
        private $id;
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

        public function getDireccion()
        {
            return $this->direccion;
        }

        public function setDireccion($direccion)
        {
            $this->direccion = $direccion;
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