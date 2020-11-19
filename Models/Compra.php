<?php
    namespace Models;

    class Compra
    {
        private $idFuncion;
        private $fecha_compra;
        private $fecha_funcion;
        private $idUsuario;
        private $cantidad;
        private $montoTotal;
        private $cineNombre;
        private $salaNombre;
        private $peliculaNombre;
    
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

        public function getIdUsuario()
        {
            return $this->idUsuario;
        }

        public function setIdUsuario($idUsuario)
        {
            $this->idUsuario = $idUsuario;
        }

        public function getCantidad()
        {
            return $this->cantidad;
        }

        public function setCantidad($cantidad)
        {
            $this->cantidad = $cantidad;
        }

        public function getMontoTotal()
        {
            return $this->montoTotal;
        }

        public function setMontoTotal($montoTotal)
        {
            $this->montoTotal = $montoTotal;
        }

        public function getCineNombre()
        {
            return $this->cineNombre;
        }

        public function setCineNombre($cineNombre)
        {
            $this->cineNombre = $cineNombre;
        }

        public function getSalaNombre()
        {
            return $this->salaNombre;
        }

        public function setSalaNombre($salaNombre)
        {
            $this->salaNombre = $salaNombre;
        }

        public function getPeliculaNombre()
        {
            return $this->peliculaNombre;
        }

        public function setPeliculaNombre($peliculaNombre)
        {
            $this->peliculaNombre = $peliculaNombre;
        }
    }
?>