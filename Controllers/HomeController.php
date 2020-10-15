<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;

    class HomeController
    {
        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function Index($message = "")
        {            
            //require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."home.php");            
        }

        public function ShowMuro()
        {
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."muro.php");
        }

        public function Login($userName=null, $password=null)
        {
            $user = $this->userDAO->GetByUserName($userName);

            if(($user != null) && ($user->getPassword() === $password))
            {
                $_SESSION["loggedUser"] = $user;
                $this->ShowMuro();
            }
            else
                $this->Index("Usuario y/o Contraseña incorrectos");
        }
        
        public function Logout()
        {
           
            session_destroy();
            
            

            $this->Index();
        }
    }
?>