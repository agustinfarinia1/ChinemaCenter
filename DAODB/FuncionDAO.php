<?php
namespace DAODB;

use DAODB\Connection as Connection;
use DAODB\QueryType as QueryType;
use Models\Funcion as Funcion;

class FuncionDAO
{
    private $connection; 
    private $tableName = "funciones";
    private $funcionesList = array(); 

    public function getAll()
    {
        $query = "CALL SP_FUN_GET_ALL()";

        $this->connection = Connection::GetInstance();

        $results = $this->connection->Execute($query,array(),QueryType::StoredProcedure);

        foreach($results as $row)
        {
            $f = new Funcion();
            $f->setIdFuncion($row["id_funcion"]);
            $f->setIdSala($row["id_sala"]);
            $f->setFechaInicio($row["fecha_inicio"]);
            $f->setFechaFin($row["fecha_fin"]); 
            $f->setHoraInicio($row["hora_inicio"]);
            $f->setHoraFin($row["hora_fin"]); 
            $f->setLunes($row["lunes"]);
            $f->setMartes($row["martes"]); 
            $f->setMiercoles($row["miercoles"]);
            $f->setJueves($row["jueves"]); 
            $f->setViernes($row["viernes"]);
            $f->setSabado($row["sabado"]); 
            $f->setDomingo($row["domingo"]);
            $f->setEstreno($row["estreno"]);
            $f->setNombreCine($row["nombre_cine"]);
            $f->setNombreSala($row["nombre_sala"]);
            $f->setNombrePelicula($row["nombre_pelicula"]);
            $f->setFoto($row["foto"]);
            $f->setPoster($row["poster"]);
            $f->setComentario($row["comentario"]);
        
            array_push($this->funcionesList, $f);
        } 
        
        return $this->funcionesList;
    }

    public function getPorId($id)
    {
        $query = "CALL SP_FUN_GET_X_ID(:idFuncion)";

        $parameters["idFuncion"] =  $id;

        $this->connection = Connection::GetInstance();

        $results = $this->connection->Execute($query,$parameters);

        foreach($results as $row)
        {
            $f = new Funcion();
            $f->setIdFuncion($row["id_funcion"]);
            $f->setIdSala($row["id_sala"]);
            $f->setFechaInicio($row["fecha_inicio"]);
            $f->setFechaFin($row["fecha_fin"]); 
            $f->setHoraInicio($row["hora_inicio"]);
            $f->setHoraFin($row["hora_fin"]); 
            $f->setLunes($row["lunes"]);
            $f->setMartes($row["martes"]); 
            $f->setMiercoles($row["miercoles"]);
            $f->setJueves($row["jueves"]); 
            $f->setViernes($row["viernes"]);
            $f->setSabado($row["sabado"]); 
            $f->setDomingo($row["domingo"]);
            $f->setEstreno($row["estreno"]);
            $f->setNombreCine($row["nombre_cine"]);
            $f->setNombreSala($row["nombre_sala"]);
            $f->setNombrePelicula($row["nombre_pelicula"]);
            $f->setFoto($row["foto"]);
            $f->setPoster($row["poster"]);
            $f->setComentario($row["comentario"]);
        
            array_push($this->funcionesList, $f);
        } 
        
        return $this->funcionesList;
    }
    
    public function Add(Funcion $funcion)
    {
        //INSERT INTO funciones(id_sala, id_pelicula, fecha_inicio, fecha_fin, hora_inicio ,hora_fin, lunes, miercoles, viernes)
        $query = "INSERT INTO " . $this->tableName . " (id_sala, id_pelicula, fecha_inicio, fecha_fin, hora_inicio, hora_fin, lunes, martes, miercoles,jueves,viernes,sabado,domingo) VALUES (:idSala, :idPelicula, :fechaInicio, :fechaFin, :horaInicio, :horaFin, :lunes, :martes, :miercoles, :jueves, :viernes, :sabado, :domingo)";           
       
        $parameters["idSala"] =  $funcion->getIdSala();
        $parameters["idPelicula"] =  $funcion->getIdPelicula();
        $parameters["fechaInicio"] =  $funcion->getFechaInicio();
        $parameters["fechaFin"] = $funcion->getFechaFin(); 
        $parameters["horaInicio"] =  $funcion->getHoraInicio();
        $parameters["horaFin"] = $funcion->getHoraFin(); 
        $parameters["lunes"] =  $funcion->getLunes();
        $parameters["martes"] = $funcion->getMartes(); 
        $parameters["miercoles"] =  $funcion->getMiercoles();
        $parameters["jueves"] = $funcion->getJueves(); 
        $parameters["viernes"] =  $funcion->getViernes();
        $parameters["sabado"] = $funcion->getSabado(); 
        $parameters["domingo"] =  $funcion->getDomingo();

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

    //Si la funcion que se quiere insertar se superpone en dia u horario con funciones ya existentes,
    // este metodo retorna las funciones con las que se superpondria 
    public function comprobarDisponibilidad(Funcion $funcion)
    {
        //SELECT * FROM funciones WHERE fecha_inicio <= "2020-11-22" AND fecha_fin >=  "2020-11-10" AND hora_inicio <= "18:00" AND hora_fin >= "17:00" AND (lunes = 1 OR martes = 0 OR miercoles = 1 OR jueves = 0 OR viernes = 1 OR sabado = 0 OR domingo = 0);
        $query = "SELECT * FROM " . $this->tableName . " WHERE fecha_inicio <= :fechaFin AND fecha_fin >= :fechaInicio AND hora_inicio <= :horaFin AND hora_fin >= :horaInicio AND (lunes = :lunes OR martes = :martes OR miercoles = :miercoles OR jueves = :jueves OR viernes = :viernes OR sabado = :sabado OR domingo = :domingo) AND id_funcion <> :idFuncion AND estado=1";           

        $parameters["idFuncion"] =  ($funcion->getIdFuncion()) ? $funcion->getIdFuncion() : -1;
        $parameters["fechaInicio"] =  $funcion->getFechaInicio();
        $parameters["fechaFin"] = $funcion->getFechaFin(); 
        $parameters["horaInicio"] =  $funcion->getHoraInicio();
        $parameters["horaFin"] = $funcion->getHoraFin(); 
        $parameters["lunes"] =  $funcion->getLunes();
        $parameters["martes"] = $funcion->getMartes(); 
        $parameters["miercoles"] =  $funcion->getMiercoles();
        $parameters["jueves"] = $funcion->getJueves(); 
        $parameters["viernes"] =  $funcion->getViernes();
        $parameters["sabado"] = $funcion->getSabado(); 
        $parameters["domingo"] =  $funcion->getDomingo();

        $this->connection = Connection::GetInstance();

        $results = $this->connection->Execute($query, $parameters);

        foreach($results as $row)
        {
            $f = new Funcion();
            $f->setIdSala($row["id_sala"]);
            $f->setFechaInicio($row["fecha_inicio"]);
            $f->setFechaFin($row["fecha_fin"]); 
            $f->setHoraInicio($row["hora_inicio"]);
            $f->setHoraFin($row["hora_fin"]); 
            $f->setLunes($row["lunes"]);
            $f->setMartes($row["martes"]); 
            $f->setMiercoles($row["miercoles"]);
            $f->setJueves($row["jueves"]); 
            $f->setViernes($row["viernes"]);
            $f->setSabado($row["sabado"]); 
            $f->setDomingo($row["domingo"]);
          
            array_push($this->funcionesList, $f);
        } 
        
        return $this->funcionesList;
    }

    public function remove($id)
    {
        $query = "CALL SP_FUN_DELETE(:idFuncion)";

        $parameters["idFuncion"] =  $id;
       
        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }

    public function edit(Funcion $funcion)
    {
        //INSERT INTO funciones(id_sala, id_pelicula, fecha_inicio, fecha_fin, hora_inicio ,hora_fin, lunes, miercoles, viernes)
        $query = "CALL SP_FUN_EDIT (:idFuncion,:fechaInicio, :fechaFin, :horaInicio, :horaFin, :lunes, :martes, :miercoles, :jueves, :viernes, :sabado, :domingo)";           
       
        $parameters["idFuncion"] =  $funcion->getIdFuncion();
        //$parameters["idSala"] =  $funcion->getIdSala();
        //$parameters["idPelicula"] =  $funcion->getIdPelicula();
        $parameters["fechaInicio"] =  $funcion->getFechaInicio();
        $parameters["fechaFin"] = $funcion->getFechaFin(); 
        $parameters["horaInicio"] =  $funcion->getHoraInicio();
        $parameters["horaFin"] = $funcion->getHoraFin(); 
        $parameters["lunes"] =  $funcion->getLunes();
        $parameters["martes"] = $funcion->getMartes(); 
        $parameters["miercoles"] =  $funcion->getMiercoles();
        $parameters["jueves"] = $funcion->getJueves(); 
        $parameters["viernes"] =  $funcion->getViernes();
        $parameters["sabado"] = $funcion->getSabado(); 
        $parameters["domingo"] =  $funcion->getDomingo();

        $this->connection = Connection::GetInstance();

        $this->connection->ExecuteNonQuery($query, $parameters);
    }
    

}

?>