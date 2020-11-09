<?php
    namespace Controllers;

   
    //use DAOJSON\CineDAO as CineDAO;
    //use DAOJSON\SalaDAO as SalaDAO;
    use DAODB\CineDAO as CineDAO;
    use DAODB\SalaDAO as SalaDAO;
    use Models\Cine as Cine;

    class CineController
    {
        private $cineDAO;

        public function __construct()
        {
            $this->cineDAO = new CineDAO();
            $this->salaDAO = new SalaDAO();
        }

        // public function ShowAddView()
        // {
        //     require_once(VIEWS_PATH."validate-session.php");
        //     require_once(VIEWS_PATH."add-cellphone.php");
        // }

        public function ShowListView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."validate-rol.php");            

            $cineList = $this->cineDAO->getAll();
            $salaList = $this->salaDAO->getAll();
            

            //$cineList = $this->cineDAO->getAll();            

            require_once(VIEWS_PATH."cine-list.php");
        }

        public function Add($nombre, $direccion)
        {
            require_once(VIEWS_PATH."validate-session.php");

            $cine = new Cine();
            $cine->setNombre($nombre);
            $cine->setDireccion($direccion);
            // $cine->setCapacidad($capacidad);
            // $cine->setPrecio($precio);

            $this->cineDAO->Add($cine);

            header('Location:ShowListView');
            // $this->ShowListView();
        }

        public function Edit($nombre, $direccion, $id)
        {
            require_once(VIEWS_PATH."validate-session.php");
            
            $cine = new Cine();
            $cine->setId($id);
            $cine->setNombre($nombre);
            $cine->setDireccion($direccion);
            // $cine->setCapacidad($capacidad);
            // $cine->setPrecio($precio);

            $this->cineDAO->Edit($cine);

            header('Location:ShowListView');
            // $this->ShowListView();
        }

        public function Remove($id)
        {
            require_once(VIEWS_PATH."validate-session.php");
            
            $this->cineDAO->Remove($id);

            
            header('Location:ShowListView');
            // $this->ShowListView();
        }
    }
?>