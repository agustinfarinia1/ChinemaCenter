<?php
    namespace Controllers;

    use DAOJSON\FuncionDAO as FuncionDAO;
    use Models\Funcion as Funcion;

    class FuncionController
    {
        private $funcionDAO;

        // public function __construct()
        // {
        //     $this->funcionDAO = new FuncionDAO();
        // }

        // public function Add($funcion)
        // {
        //     require_once(VIEWS_PATH."validate-session.php");

        //     $this->funcionDAO->Add($funcion);

        // }

        // public function getAll(){
        //     return $this->funcionDAO->getAll();
        // }

        /*  public function Remove($id)
        {
            require_once(VIEWS_PATH."validate-session.php");
            
            $this->cellPhoneDAO->Remove($id);

            $this->ShowListView();
        } */

        public function SetSala($idSala)
        {           
            $_SESSION["sala"] = $idSala;
            header("Location:" . FRONT_ROOT . 'Pelicula/Index' );
        }

        public function SetPelicula($idPelicula=0)
        {           
            $_SESSION["idPelicula"] = $idPelicula;            
            require_once(VIEWS_PATH."funcion-add.php");
        }

        public function Add(){

            //llamnar a la api y traer lo que dura la peli

            // calcular la hora de fin de la funcion

            //insertar en la BD

            require_once(VIEWS_PATH."funcion-cartelera.php");

        }

        public function Cartelera(){
            require_once(VIEWS_PATH."funcion-cartelera.php");
        }

        public function Pelicula(){
            require_once(VIEWS_PATH."funcion-pelicula.php");
        }

        public function Listar(){
            require_once(VIEWS_PATH."funcion-list.php");
        }

    }
?>