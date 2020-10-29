<?php
    namespace Controllers;

    use DAO\CineDAO as CineDAO;
    use Models\Cine as Cine;

    class CineController
    {
        private $cineDAO;

        public function __construct()
        {
            $this->cineDAO = new CineDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."add-cellphone.php");
        }

        public function ShowListView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."validate-rol.php");            
            $cineList = $this->cineDAO->getAll();
            
            require_once(VIEWS_PATH."cine-list.php");
        }

        public function Add($nombre, $direccion, $capacidad, $precio)
        {
            require_once(VIEWS_PATH."validate-session.php");

            $cine = new Cine();
            $cine->setNombre($nombre);
            $cine->setDireccion($direccion);
            $cine->setCapacidad($capacidad);
            $cine->setPrecio($precio);

            $this->cineDAO->Add($cine);

            header('Location:ShowListView');
            // $this->ShowListView();
        }

        public function Edit($nombre, $direccion, $capacidad, $precio, $id)
        {
            require_once(VIEWS_PATH."validate-session.php");
            
            $cine = new Cine();
            $cine->setId($id);
            $cine->setNombre($nombre);
            $cine->setDireccion($direccion);
            $cine->setCapacidad($capacidad);
            $cine->setPrecio($precio);

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