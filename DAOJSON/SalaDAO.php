<?php
    namespace DAOJSON;
   
    use Models\Sala as Sala;

    class SalaDAO
    {
        private $salaList = array();
        private $fileName = ROOT."Data/Salas.json";

        public function Add(Sala $sala)
        {
            $this->RetrieveData();
            
            $sala->setId($this->GetNextId());
            
            array_push($this->salaList, $sala);

            $this->SaveData();
        }

        public function Edit(Sala $sala)
        {
            $this->RetrieveData();
            
            foreach($this->salaList as $s){                
                if($s->getId() == $sala->getId()){                    
                    $s->setNombre($sala->getNombre());
                    $s->setCapacidad($sala->getCapacidad());
                    $s->setPrecio($sala->getPrecio());
                }
            }

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->salaList;
        }

        public function Remove($id)
        {            
            $this->RetrieveData();
            
            $this->salaList = array_filter($this->salaList, function($sala) use($id){                
                return $sala->getId() != $id;
            });
            
            $this->SaveData();
        }

        private function RetrieveData()
        {            
             $this->salaList = array();

             if(file_exists($this->fileName))
             {
                 $jsonToDecode = file_get_contents($this->fileName);

                 $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
                 
                 foreach($contentArray as $content)
                 {
                     $sala = new Sala();
                     $sala->setId($content["id"]);
                     $sala->setIdCine($content["id_cine"]);
                     $sala->setNombre($content["nombre"]);
                     $sala->setCapacidad($content["capacidad"]);
                     $sala->setPrecio($content["precio"]);

                     array_push($this->salaList, $sala);
                 }
             }
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->salaList as $sala)
            {
                $valuesArray = array();
                $valuesArray["id"] = $sala->getId();
                $valuesArray["id_cine"] = $sala->getIdCine();
                $valuesArray["nombre"] = $sala->getNombre();
                $valuesArray["capacidad"] = $sala->getCapacidad();
                $valuesArray["precio"] = $sala->getPrecio();
                array_push($arrayToEncode, $valuesArray);
            }

            $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents($this->fileName, $fileContent);
        }

        private function GetNextId()
        {
            $id = 0;

            foreach($this->salaList as $sala)
            {
                $id = ($sala->getId() > $id) ? $sala->getId() : $id;
            }

            return $id + 1;
        }
    }
?>