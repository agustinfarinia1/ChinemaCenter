<?php
    namespace Models;

    class Admin
    {
        private $firstName;
        private $lastName;
      //  private $legajo;

      //TODO: Legajo va a tener autoincremental despues

        public function getFirstName()
        {
            return $this->firstname;
        }

        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;
        }

        public function getlastName()
        {
            return $this->lastName;
        }

        public function setlastName($lastName)
        {
            $this->lastName = $lastName;
        }
        
        /*
         public function getFirstName()
         {
             return $this->firstname;
         }
 
         public function setFirstName($firstName)
         {
             $this->firstName = $firstName;
         }
         
         */
    }