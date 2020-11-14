<?php
    namespace Models;

    class Compra
    {
        private $idFuncion;
        private $fecha_compra;
        private $fecha_funcion;
        private $email;
        private $cantidad;
    
        public function getIdFuncion()
        {
            return $this->idFuncion;
        }

        public function setIdFuncion($idFuncion)
        {
            $this->idFuncion = $idFuncion;
        }

        public function getFechaCompra()
        {
            return $this->fecha_compra;
        }

        public function setFechaCompra($fecha_compra)
        {
            $this->fecha_compra = $fecha_compra;
        }

        public function getFechaFuncion()
        {
            return $this->fecha_funcion;
        }

        public function setFechaFuncion($fecha_funcion)
        {
            $this->fecha_funcion = $fecha_funcion;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getCantidad()
        {
            return $this->cantidad;
        }

        public function setCantidad($cantidad)
        {
            $this->cantidad = $cantidad;
        }
    }
?>