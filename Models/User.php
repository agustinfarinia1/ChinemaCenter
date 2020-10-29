<?php
    namespace Models;

    class User
    {
        private $userName;
        private $password;
        private $name;
        private $rol;

        public function getUserName()
        {
            return $this->userName;
        }

        public function setUserName($userName)
        {
            $this->userName = $userName;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setRol($rol)
        {
            $this->rol = $rol;
        }

        public function getRol()
        {
            return $this->rol;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }
    }
?>