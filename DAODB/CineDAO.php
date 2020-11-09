<?php
    namespace DAODB;

    use DAODB\Connection as Connection;
    use Interfaces\ICineDAO as ICineDAO;
    use Models\Cine as Cine;
    
    class CineDAO implements ICineDAO
    {
        private $connection; 
        private $tableName = "cines";
        private $cineList = array();  
        
       
        public function Add(Cine $cine)
        {
            $query = "INSERT INTO " . $this->tableName . "(nombre,direccion) VALUES (:nombre,:direccion)";           

            $parameters["nombre"] =  $cine->getNombre();
            $parameters["direccion"] = $cine->getDireccion(); 

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);

        }

      
        public function GetAll()
        {
            $query = "SELECT id_cine, nombre, direccion FROM " . $this->tableName . " WHERE estado = 1";

            $this->connection = Connection::GetInstance();

            $results = $this->connection->Execute($query);

            foreach($results as $row)
            {
                $cine = new Cine();
                $cine->setId($row["id_cine"]);
                $cine->setNombre($row["nombre"]);
                $cine->setDireccion($row["direccion"]);
                array_push($this->cineList, $cine);
            } 
            
            return $this->cineList;
        }

       
        public function Remove($id)
        {
            $query = "UPDATE " . $this->tableName . " SET estado=0 WHERE id_cine= :id_cine"; 

            $parameters["id_cine"] =  $id;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }

        
        public function  Edit(Cine $cine)
        {
            $query = "UPDATE " . $this->tableName . " SET nombre=:nombre, direccion=:direccion WHERE id_cine= :id_cine"; 

            $parameters["id_cine"] =  $cine->getId();
            $parameters["nombre"] =  $cine->getNombre();
            $parameters["direccion"] =  $cine->getDireccion();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }

    }
?>