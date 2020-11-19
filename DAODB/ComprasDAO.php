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

        public function cantidadesCine(){
            $query = "SELECT  sum(cantidad) as cantidad, cines.nombre as cine_nombre
            from compras 
            join funciones on funciones.id_funcion = compras.id_funcion
            join salas on funciones.id_sala = salas.id_sala
            join cines on salas.id_cine = cines.id_cine
            GROUP BY cines.id_cine";

            $this->connection = Connection::GetInstance();

            $results = $this->connection->Execute($query);

            foreach($results as $row)
            {
                $compra = new Compra();
                $compra->setCineNombre($row["cine_nombre"]);
                $compra->setCantidad($row["cantidad"]);
                array_push($this->comprasList, $compra);
            } 
            
            return $this->comprasList;
        }

        public function cantidadesPelicula(){

            $query = "SELECT SUM(cantidad) as cantidad, peliculas.nombre as pelicula_nombre
            from compras
            join funciones on funciones.id_funcion = compras.id_funcion
            join peliculas on peliculas.id_pelicula = funciones.id_pelicula 
            GROUP BY funciones.id_funcion";

            $this->connection = Connection::GetInstance();

            $results = $this->connection->Execute($query);

            foreach($results as $row)
            {
                $compra = new Compra();
                $compra->setPeliculaNombre($row["pelicula_nombre"]);
                $compra->setCantidad($row["cantidad"]);
                array_push($this->comprasList, $compra);
            } 
            
            return $this->comprasList;            
        }

        public function totalesCine($desde, $hasta){
            $query = "SELECT sum(monto_total) as total, cines.nombre, compras.fecha_funcion
            from compras 
            join funciones on funciones.id_funcion = compras.id_funcion
            join salas on funciones.id_sala = salas.id_sala
            join cines on salas.id_cine = cines.id_cine
            where  '" . $desde ."' <= fecha_funcion and fecha_funcion <= '" . $hasta ."'
            GROUP BY cines.id_cine, compras.fecha_funcion
            order by fecha_funcion";

            $this->connection = Connection::GetInstance();

            $results = $this->connection->Execute($query);

            foreach($results as $row)
            {
                $compra = new Compra();
                $compra->setCineNombre($row["nombre"]);
                $compra->setCantidad($row["total"]);
                $compra->setFechaFuncion($row["fecha_funcion"]);
                array_push($this->comprasList, $compra);
            } 
            
            return $this->comprasList;
        }

        public function totalesPelicula($desde, $hasta){
            $query = "SELECT  sum(monto_total) as total, peliculas.nombre AS pelicula_nombre
            from compras 
            join funciones on funciones.id_funcion = compras.id_funcion
            join peliculas on peliculas.id_pelicula = funciones.id_pelicula
            where  '" . $desde ."' <= fecha_funcion and fecha_funcion <= '" . $hasta ."'
            GROUP BY funciones.id_pelicula";

            $this->connection = Connection::GetInstance();

            $results = $this->connection->Execute($query);

            foreach($results as $row)
            {
                $compra = new Compra();
                $compra->setPeliculaNombre($row["pelicula_nombre"]);
                $compra->setCantidad($row["total"]);
                array_push($this->comprasList, $compra);
            } 
            
            return $this->comprasList;
        }

    }

     
?>