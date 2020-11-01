<?php
    namespace DB;

    use Models\Funcion as Funcion;
    use DB\IFuncionDAO as IFuncionDAO;
    use DB\Connection as Connection;
    use DB\QueryType as QueryType;

    class FuncionDAO implements IFuncionDAO
    {
        private $connection;
        private $tableName = "funciones";
        
        public function Add(Funcion $newFuncion)
        {
            if($this->validarFuncion($newFuncion)){
                $query = "INSERT INTO funciones (id_cine, id_pelicula, hora_funcion_inicio, hora_funcion_fin) VALUES (:id_cine, :id_pelicula, :hora_funcion_inicio, :hora_funcion_fin);";

                $parameters['id_cine'] = $newFuncion->getIdCine();
                $parameters['id_pelicula'] = $newFuncion->getIdPelicula();
                $parameters['hora_funcion_inicio'] = $newFuncion->getFechaHoraInicio();
                $parameters['hora_funcion_fin'] = $newFuncion->getFechaHoraFin();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

                $this->getAll();
            }
            else{
                echo "existe una pelicula en ese horario";
            }
        }

        public function GetAll()
        {
            $funcionesList = array();

            $query = "	SELECT id_sala,id_cine,id_pelicula,hora_funcion_inicio,hora_funcion_fin
            FROM funciones;";

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query, array(), QueryType::StoredProcedure);

            foreach($result as $row)
            {
                $funcion = new Funcion();
                $funcion->setIdSala($row["id_sala"]);
                $funcion->setIdCine($row["id_cine"]);
                $funcion->setIdPelicula($row["id_pelicula"]);
                $funcion->setFechaHoraInicio($row["hora_funcion_inicio"]);
                $funcion->setFechaHoraFin($row["hora_funcion_fin"]);

                array_push($funcionesList, $funcion);
            }

            return $funcionesList;
        }

        public function validarFuncion($funcion){

            $query = 'select * from funciones where ("'.$funcion->getFechaHoraInicio().'" < hora_funcion_fin ) and ("'.$funcion->getFechaHoraFin().'" > hora_funcion_inicio );';

            $this->connection = Connection::GetInstance();

            $result = $this->connection->Execute($query, array(), QueryType::StoredProcedure);

            if($result){
                return false;
            }
            else{
                return true;
            }
        }

        /*  public function Remove($id) // ESTA SIN IMPLEMENTAR, 
        {            
            $query = "CALL CellPhones_Delete(?)";

            $parameters["id"] =  $id;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
        }   */
    }
?>