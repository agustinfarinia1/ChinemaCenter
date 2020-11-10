<?php
namespace DAODB;

use DAODB\Connection as Connection;
use Models\Funcion as Funcion;

class FuncionDAO
{
    private $connection; 
    private $tableName = "funciones";
    private $funcionesList = array(); 
    
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
    public function comprobarDisponivilidad(Funcion $funcion)
    {
        //SELECT * FROM funciones WHERE fecha_inicio <= "2020-11-22" AND fecha_fin >=  "2020-11-10" AND hora_inicio <= "18:00" AND hora_fin >= "17:00" AND (lunes = 1 OR martes = 0 OR miercoles = 1 OR jueves = 0 OR viernes = 1 OR sabado = 0 OR domingo = 0);
        $query = "SELECT * FROM " . $this->tableName . " WHERE fecha_inicio <= :fechaFin AND fecha_fin >= :fechaInicio AND hora_inicio <= :horaFin AND hora_fin >= :horaInicio AND (lunes = :lunes OR martes = :martes OR miercoles = :miercoles OR jueves = :jueves OR viernes = :viernes OR sabado = :sabado OR domingo = :domingo)";           

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
            // $f->setFechaInicio($row["id_sala"]);
            // $f->setFechaFin($row["id_sala"]); 
            // $f->setHoraInicio($row["id_sala"]);
            // $f->setHoraFin($row["id_sala"]); 
            // $f->setLunes($row["id_sala"]);
            // $f->setMartes(); 
            // $f->setMiercoles($row["id_sala"]);
            // $f->setJueves($row["id_sala"]); 
            // $f->setViernes($row["id_sala"]);
            // $f->setSabado(); 
            // $f>gstDomingo($row["id_sala"]);
          
            array_push($this->funcionesList, $f);
        } 
        
        return $this->funcionesList;
    }

}

?>