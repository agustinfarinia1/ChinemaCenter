<?php
    namespace DAODB;

    use DAODB\Connection as Connection;
    use Interfaces\ISalaDAO as ISalaDAO;
    use Models\Sala as Sala;
    
    class SalaDAO implements ISalaDAO
    {
        private $connection; 
        private $tableName = "salas";
        private $salaList = array();  
        
       
        public function Add(Sala $sala)
        {           
            $query = "INSERT INTO " . $this->tableName . "(id_cine,nombre,capacidad,precio) VALUES (:id_cine,:nombre,:capacidad,:precio)";           

            $parameters["id_cine"] =  $sala->getIdCine();
            $parameters["nombre"] =  $sala->getNombre();
            $parameters["capacidad"] = $sala->getCapacidad(); 
            $parameters["precio"] = $sala->getPrecio(); 

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);

        }

      
        public function GetAll()
        {
            $query = "SELECT id_sala, id_cine, nombre, capacidad, precio FROM " . $this->tableName . " WHERE estado = 1";

            $this->connection = Connection::GetInstance();

            $results = $this->connection->Execute($query);

            foreach($results as $row)
            {
                $sala = new Sala();
                $sala->setId($row["id_sala"]);
                $sala->setIdCine($row["id_cine"]);
                $sala->setNombre($row["nombre"]);
                $sala->setCapacidad($row["capacidad"]);
                $sala->setPrecio($row["precio"]);
                array_push($this->salaList, $sala);
            } 
            
            return $this->salaList;
        }

       
        public function Remove($id)
        {
            $query = "UPDATE " . $this->tableName . " SET estado=0 WHERE id_sala= :id_sala"; 

            $parameters["id_sala"] =  $id;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }

        
        public function  Edit(Sala $sala)
        {
            $query = "UPDATE " . $this->tableName . " SET  nombre=:nombre, capacidad=:capacidad, precio=:precio WHERE id_sala= :id_sala"; 
           
            $parameters["id_sala"] =  $sala->getId();
            $parameters["nombre"] =  $sala->getNombre();
            $parameters["capacidad"] = $sala->getCapacidad(); 
            $parameters["precio"] = $sala->getPrecio(); 

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }

    }
?>