<?php
    namespace Controllers;

    use DAOJSON\CineDAO as CineDAO;
    use DAOJSON\SalaDAO as SalaDAO;
    use Models\Sala as Sala;

    class SalaController
    {
        private $salaDAO;
        private $cineDAO;

        public function __construct()
        {
            $this->salaDAO = new SalaDAO();
            $this->cineDAO = new CineDAO();
        }

        // public function ShowAddView()
        // {
        //     require_once(VIEWS_PATH."validate-session.php");
        //     // require_once(VIEWS_PATH."add-cellphone.php");
        // }

        // public function ShowListView()
        // {
        //     require_once(VIEWS_PATH."validate-session.php");
        //     require_once(VIEWS_PATH."validate-rol.php");   
        //     $cineList = $this->cineDAO->getAll();         
        //     $salaList = $this->salaDAO->getAll();
            
        //     require_once(VIEWS_PATH."cine-list.php");
        // }

        public function Add($nombre, $capacidad, $precio, $id_cine)
        {
            require_once(VIEWS_PATH."validate-session.php");

            $sala = new Sala();
            $sala->setIdCine($id_cine);
            $sala->setNombre($nombre);
            $sala->setCapacidad($capacidad);
            $sala->setPrecio($precio);

            $this->salaDAO->Add($sala);

            header("Location:" . FRONT_ROOT . 'Cine/ShowListView' );
            // $this->ShowListView();
        }

        public function Edit($nombre, $capacidad, $precio, $id)
        {
            require_once(VIEWS_PATH."validate-session.php");
            
            $sala = new Sala();
            $sala->setId($id);
            $sala->setNombre($nombre);
            $sala->setCapacidad($capacidad);
            $sala->setPrecio($precio);

            $this->salaDAO->Edit($sala);

            header("Location:" . FRONT_ROOT . 'Cine/ShowListView' );
            // header('Location:ShowListView');
            // $this->ShowListView();
        }

        public function Remove($id)
        {
            require_once(VIEWS_PATH."validate-session.php");
            
            $this->salaDAO->Remove($id);

            header("Location:" . FRONT_ROOT . 'Cine/ShowListView' );
            // header('Location:ShowListView');
            // $this->ShowListView();
        }
    }
?>