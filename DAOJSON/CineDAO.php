<?php
    namespace DAOJSON;

    use Interfaces\ICineDAO as ICineDAO;
    use Models\Cine as Cine;

    class CineDAO implements ICineDAO
    {
        private $cineList = array();
        private $fileName = ROOT."Data/Cines.json";

        public function Add(Cine $cine)
        {
            $this->RetrieveData();
            
            $cine->setId($this->GetNextId());
            
            array_push($this->cineList, $cine);

            $this->SaveData();
        }

        public function Edit(Cine $cine)
        {
            $this->RetrieveData();
            
            foreach($this->cineList as $c){                
                if($c->getId() == $cine->getId()){                    
                    $c->setNombre($cine->getNombre());
                    $c->setDireccion($cine->getDireccion());
                    // $c->setCapacidad($cine->getCapacidad());
                    // $c->setPrecio($cine->getPrecio());
                }
            }

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->cineList;
        }

        public function Remove($id)
        {            
            $this->RetrieveData();
            
            $this->cineList = array_filter($this->cineList, function($cine) use($id){                
                return $cine->getId() != $id;
            });
            
            $this->SaveData();
        }

        private function RetrieveData()
        {            
             $this->cineList = array();

             if(file_exists($this->fileName))
             {
                 $jsonToDecode = file_get_contents($this->fileName);

                 $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
                 
                 foreach($contentArray as $content)
                 {
                     $cine = new Cine();
                     $cine->setId($content["id"]);
                     $cine->setNombre($content["nombre"]);
                     $cine->setDireccion($content["direccion"]);
                    //  $cine->setCapacidad($content["capacidad"]);
                    //  $cine->setPrecio($content["precio"]);

                     array_push($this->cineList, $cine);
                 }
             }
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->cineList as $cine)
            {
                $valuesArray = array();
                $valuesArray["id"] = $cine->getId();
                $valuesArray["nombre"] = $cine->getNombre();
                $valuesArray["direccion"] = $cine->getDireccion();
                // $valuesArray["capacidad"] = $cine->getCapacidad();
                // $valuesArray["precio"] = $cine->getPrecio();
                array_push($arrayToEncode, $valuesArray);
            }

            $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents($this->fileName, $fileContent);
        }

        private function GetNextId()
        {
            $id = 0;

            foreach($this->cineList as $cine)
            {
                $id = ($cine->getId() > $id) ? $cine->getId() : $id;
            }

            return $id + 1;
        }
    }
?>