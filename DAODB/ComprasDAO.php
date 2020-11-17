<?php
    namespace DAODB;

    use DAODB\Connection as Connection;
    use Interfaces\IComprasDAO as IComprasDAO;
    use Models\Compra as Compra;
    
    class ComprasDAO implements IComprasDAO
    {
        private $connection; 
        private $tableName = "compras";
        private $comprasList = array();  
        
       
        public function add(Compra $compra)
        {
            $query = "INSERT INTO " . $this->tableName . "(id_funcion,fecha_compra,fecha_funcion,id_usuario,cantidad,monto_total) VALUES (:id_funcion,:fecha_compra,:fecha_funcion,:id_usuario,:cantidad,:monto_total)";           

            $parameters["id_funcion"] =  $compra->getIdFuncion();
            $parameters["fecha_compra"] =  $compra->getFechaCompra();
            $parameters["fecha_funcion"] = $compra->getFechaFuncion(); 
            $parameters["id_usuario"] =  $compra->getIdUsuario();
            $parameters["cantidad"] = $compra->getCantidad(); 
            $parameters["monto_total"] = $compra->getMontoTotal(); 

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);

        }

      
        public function GetAll()
        {
            $query = "SELECT id_funcion,fecha_compra,fecha_funcion,id_usuario,cantidad,monto_total FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $results = $this->connection->Execute($query);

            foreach($results as $row)
            {
                $compra = new Compra();
                $compra->setIdFuncion($row["id_funcion"]);
                $compra->setFechaCompra($row["fecha_compra"]);
                $compra->setFechaFuncion($row["fecha_funcion"]);
                $compra->setIdUsuario($row["id_usuario"]);
                $compra->setCantidad($row["cantidad"]);
                $compra->setMontoTotal($row["monto_total"]);
                array_push($this->comprasList, $compra);
            } 
            
            return $this->comprasList;
        }
    }
?>