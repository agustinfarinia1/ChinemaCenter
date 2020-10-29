<?php namespace DAOJSON;

    use DAOJSON\IPeliculaDAO as IPeliculaDAO;
    use Models\Pelicula as Pelicula;

    class PeliculaDAO implements IPeliculaDAO
    {
        private $listaPeliculas = array();
        private $fileName = ROOT."Data/Peliculas.json";
        

        public function Add($peli){
            $this->RetrieveData();
            array_push($this->listaPeliculas,$peli);
            $this->SaveData();
        }

        public function DeleteAll(){
            $this->listaPeliculas = null;
            $this->SaveData();
        }

        public function GetAll(){
            $this->RetrieveData();
            return $this->listaPeliculas;
        }

        public function Delete($id){
            $this->RetrieveData();
            $newList = array();
           
            foreach($this->listaPeliculas as $value)
            {
               
                if($value->getID_Pelicula() != $id){
                    array_push($newList,$value);
                }
            }
            $this->listaPeliculas = $newList;
            $this->SaveData();
        }

        private function SaveData() {
            $arrayToEncode = array();
            
            
            foreach($this->listaPeliculas as $peli)
            {

                $valuesArray["id_pelicula"] = $peli->getID_Pelicula();
                $valuesArray["nombre"] = $peli->getNombre();
                $valuesArray["comentario"] = $peli->getComentario();
                $valuesArray["poster"] = $peli->getPoster();
                $valuesArray["foto"] = $peli->getFoto();
                $valuesArray["fechaSalida"] = $peli->getFechaSalida();
                $valuesArray["duracion"] = $peli->getDuracion();
 
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            $jsonPath = $this->fileName;
            
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData() {
            
            $this->listaPeliculas = array();
            $jsonPath = $this->fileName;
                
            $jsonContent = file_get_contents($jsonPath);

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            if(is_array($arrayToDecode)){
                foreach($arrayToDecode as $valuesArray)
                {
    
                    $peli = new Pelicula($valuesArray["id_pelicula"], $valuesArray["nombre"], $valuesArray["comentario"], $valuesArray["poster"], $valuesArray["foto"],$valuesArray["fechaSalida"], $valuesArray["duracion"]);
    
                    array_push($this->listaPeliculas, $peli);
    
                }
            }

        }

        public function getById($id) {
            $this->RetrieveData();
            foreach ($this->listaPeliculas as $key => $peli) {
                if($peli->getID_Pelicula() == $id) {
                    return $peli;
                }
            }
        }

        

    }
?>