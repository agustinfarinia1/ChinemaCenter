<?php

namespace DAODB;

class Connection
{
    private $pdo = null;
    private $pdoStatement = null;
    private static $instance = null;
    
    function __construct(){

    }

    public function connect()
    {
        try {
            $this->pdo = new \PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        } catch (\PDOException $e) {
            echo "Error de conexion papu =(: " . $e->getMessage();
            throw $e;
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) self::$instance = new Connection();
        return self::$instance;
    }

    public function execute($query, $parameters = array())
    {
        try {
            //levanto la consulta a la base de dato por medio de la query de recibida por parametro
            $this->pdoStatement = $this->pdo->prepare($query);

            foreach ($parameters as $parameterName => $value) {
                $this->pdoStatement->bindParam(":" . $parameterName, $value);
            }
            //ejecuto la o las queris
            $this->pdoStatement->execute();
            //devuelvo el Statment

            //$resultado = $this->pdoStatement->fetchAll();
            //var_dump($resultado);     ///esto es por si lo quiero mostrar, es de prueba
            return $this->pdoStatement->fetchAll();

        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function executeNonQuery($query, $parameters = array())
    {
        try {
            $this->pdoStatement = $this->pdo->prepare($query);
            foreach ($parameters as $parameterName => $value) {
                $this->pdoStatement->bindParam(":$parameterName", $parameters[$parameterName]);
            }
            $this->pdoStatement->execute();
            return $this->pdoStatement->rowCount();
        } catch (\PDOException $ex) {
            throw $ex;
        }
    }
}
