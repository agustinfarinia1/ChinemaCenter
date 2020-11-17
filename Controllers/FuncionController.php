<?php
    namespace Controllers;

    use DAODB\FuncionDAO as FuncionDAO;
    use DAODB\PeliculaDAO as PeliculaDAO;
    use Models\Funcion as Funcion;

    class FuncionController
    {
        private $funcionDAO;
        private $peliculaDAO;

        public function __construct()
        {
            $this->funcionDAO = new FuncionDAO();
            $this->peliculaDAO = new PeliculaDAO();
        }      

        public function getAll($op=-1){

            $funcionesList = $this->funcionDAO->getAll();

            require_once(VIEWS_PATH."funcion-list.php");
        } 
        
        public function getFuncionPorId($idFuncion,$op =-1,$mensaje = ""){
            $funcionesList = $this->funcionDAO->getPorId($idFuncion);

            $funcion = $funcionesList[0];
            //echo "<pre>";
            //var_dump($funcion);
            //echo "</pre>";
            require_once(VIEWS_PATH."funcion-pelicula.php");
        }  

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

        public function Add($fechaInicio, $fechaFin, $horaInicio, $dia1='', $dia2='', $dia3='', $dia4='', $dia5='', $dia6='', $dia7=''){

            require_once(VIEWS_PATH."validate-session.php");            
           
            $funcion = new Funcion();
            $funcion->setIdSala($_SESSION["sala"]);
            $funcion->setIdPelicula($_SESSION["idPelicula"]);
            $funcion->setFechaInicio($fechaInicio);
            $funcion->setFechaFin($fechaFin);
            $funcion->setHoraInicio($horaInicio);
            //$funcion->calcularHorafin($pelicula->getDuracion());
            $funcion->calcularHorafin(90);            
            if($dia1 != ''){
                $this->insertarDia($funcion, $dia1);
            }
            if($dia2 != ''){
                $this->insertarDia($funcion, $dia2);
            }
            if($dia3 != ''){
                $this->insertarDia($funcion, $dia3);
            }
            if($dia4 != ''){
                $this->insertarDia($funcion, $dia4);
            }
            if($dia5 != ''){
                $this->insertarDia($funcion, $dia5);
            }
            if($dia6 != ''){
                $this->insertarDia($funcion, $dia6);
            }
            if($dia7 != ''){
                $this->insertarDia($funcion, $dia7);
            }

            $funcionesList = $this->funcionDAO->comprobarDisponibilidad($funcion);
            
            if( count($funcionesList) > 0){
                require_once(VIEWS_PATH."funcion-add.php");
            }else{
                if(!$this->peliculaDAO->buscar_por_id($_SESSION["idPelicula"])){
                    $this->peliculaDAO->add($_SESSION["idPelicula"]);
                }          
                $funcionesList = $this->funcionDAO->Add($funcion);
                //require_once(VIEWS_PATH."funcion-cartelera.php");
                header('Location:Cartelera');
            }

        }

        private function insertarDia(Funcion $funcion, $dia){
            switch ($dia) {
                case 'lunes':
                    $funcion->setLunes(true);
                    break;
                case 'martes':
                    $funcion->setMartes(true);
                    break;
                case 'miercoles':
                    $funcion->setMiercoles(true);
                    break;
                case 'jueves':
                    $funcion->setJueves(true);
                    break;
                case 'viernes':
                    $funcion->setViernes(true);
                    break;
                case 'sabado':
                    $funcion->setSabado(true);
                    break;
                case 'domingo':
                    $funcion->setDomingo(true);
                    break;                
                default:                   
                    break;
            }
        }

        public function Remove($id)

            require_once(VIEWS_PATH."validate-session.php");
            $this->funcionDAO->remove($id);

            header('Location:getAll');
        }
       

        public function edit($fechaInicio, $fechaFin, $horaInicio, $idFuncion, $dia1='', $dia2='', $dia3='', $dia4='', $dia5='', $dia6='', $dia7='')
        {
            
            require_once(VIEWS_PATH."validate-session.php");
            $funcion = new Funcion();
            $funcion->setIdFuncion($idFuncion);
            //$funcion->setIdSala($_SESSION["sala"]); // no se edita
            //$funcion->setIdPelicula($_SESSION["idPelicula"]); // no se edita
            $funcion->setFechaInicio($fechaInicio);
            $funcion->setFechaFin($fechaFin);
            $funcion->setHoraInicio($horaInicio);
            //$funcion->calcularHorafin($pelicula->getDuracion());
            $funcion->calcularHorafin(90);            
            if($dia1 != ''){
                $this->insertarDia($funcion, $dia1);
            }
            if($dia2 != ''){
                $this->insertarDia($funcion, $dia2);
            }
            if($dia3 != ''){
                $this->insertarDia($funcion, $dia3);
            }
            if($dia4 != ''){
                $this->insertarDia($funcion, $dia4);
            }
            if($dia5 != ''){
                $this->insertarDia($funcion, $dia5);
            }
            if($dia6 != ''){
                $this->insertarDia($funcion, $dia6);
            }
            if($dia7 != ''){
                $this->insertarDia($funcion, $dia7);
            }

            $funcionesList = $this->funcionDAO->comprobarDisponibilidad($funcion);
            
            if( count($funcionesList) > 0){
                header('Location:getAll/1');
            }else{
                $funcionesList = $this->funcionDAO->edit($funcion);
                header('Location:getAll');
            }  
                     
        }

        public function Cartelera(){

            $funcionesList = $this->funcionDAO->getAll();
            
            require_once(VIEWS_PATH."funcion-cartelera.php");
        }

        public function Pelicula(){
            require_once(VIEWS_PATH."funcion-pelicula.php");
        }       

        public function comprobarFechaFuncion($funcion,$dia){
            switch ($dia) {
                case 0:
                        if($funcion->getDomingo()){
                            return true;
                        }
                        else{
                            return false;
                        }
                    break;
                case 1:
                        if($funcion->getLunes()){
                            return true;
                        }
                        else{
                            return false;
                        }
                    break;
                case 2:
                    if($funcion->getMartes()){
                        return true;
                    }
                    else{
                        return false;
                    }
                    break;
                case 3:
                    if($funcion->getMiercoles()){
                        return true;
                    }
                    else{
                        return false;
                    }
                    break;
                case 4:
                    if($funcion->getJueves()){
                        return true;
                    }
                    else{
                        return false;
                    }
                    break;
                case 5:
                    if($funcion->getViernes()){
                        return true;
                    }
                    else{
                        return false;
                    }
                    break;
                case 6:
                    if($funcion->getSabado()){
                        return true;
                    }
                    else{
                        return false;
                    }
                    break;
            }
        }
    }
?>