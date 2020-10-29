<?php
    namespace Controllers;

    use DB\FuncionDAO as FuncionDAO;
    use Models\Funcion as Funcion;

    class FuncionController
    {
        private $funcionDAO;

        public function __construct()
        {
            $this->funcionDAO = new FuncionDAO();
        }

        public function Add($funcion)
        {
            require_once(VIEWS_PATH."validate-session.php");

            $this->funcionDAO->Add($funcion);

        }

        public function getAll(){
            return $this->funcionDAO->getAll();
        }

        /*  public function Remove($id)
        {
            require_once(VIEWS_PATH."validate-session.php");
            
            $this->cellPhoneDAO->Remove($id);

            $this->ShowListView();
        } */
    }
?>