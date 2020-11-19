<?php

namespace DAODB;

use Interfaces\IUserDAO as IUserDAO;
use DAODB\Connection as Connection;
use Models\Exception as Exception;
use PDO;
use Models\User as User;

class UserDAO
{
    private $connection;
    private $tableName = "users";

    /*
    * Metodo que levanta el mail ingrsado y lo busca en la base de datos, si lo encuentra devuelve el usuario
    */
    public function GetByEmail($email)
    {
        $user = null;

        $query = "SELECT id_user,name, lastname, email, password, rol FROM " . $this->tableName . " WHERE (email = :email)";

        $parameters["email"] = $email;

        $this->connection = Connection::GetInstance();

        $results = $this->connection->Execute($query, $parameters);

        foreach ($results as $row) {
            $user = new User();
            $user->setId($row["id_user"]);
            $user->setName($row["name"]);
            $user->setLastname($row["lastname"]);
            $user->setEmail($row["email"]);
            $user->setPassword($row["password"]);
            $user->setRol($row["rol"]);
        }

        return $user;
    }

    function isEmail($email)
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                return true;
                } else {
                return false;
            }
        }

    public function emailExiste($email)
    {
 
        $query = "SELECT id_user FROM users WHERE email = email LIMIT 1";
        
        $parameters["email"] = $email;

        $this->connection = Connection::GetInstance();

        $results = $this->connection->Execute($query, $parameters);

        if ($results > 0){
            
            return true;
            } else {
                
            return false;	
        }
        
    }

    public function minMaxPassword($min, $max, $valor)
    {
        if (strlen(trim($valor)) < $min) {
            return true;
        } else if (strlen(trim($valor)) > $max) {
            return true;
        } else {
            return false;
        }
    }
    
    public function resultBlock($errors)
    {
        if (count($errors) > 0) {
            echo "<div id='error' class='alert alert-danger' role='alert'>
                <a href='#' onclick=\"showHide('error');\">[X]</a>
                <ul>";
            foreach ($errors as $error) {
                echo "<li>" . $error . "</li>";
            }
            echo "</ul>";
            echo "</div>";
        }  
    }

    public function add($_user)
    {


        $query = "INSERT INTO users (name, lastname, email, password) VALUES (:name, :lastname, :email, :password)";

        $parameters['name'] = $_user->getName();
        $parameters['lastname'] = $_user->getLastName();
        $parameters['email'] = $_user->getEmail();
        $parameters['password'] = $_user->getPassword();


        try {

            $this->connection = Connection::getInstance();

            return $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (\PDOException $ex) {
           
            throw $ex;
        }
    }

    public function delete($email)
    {

        $query = "DELETE FROM users WHERE email = :email";

        $parameters['email'] = $email;

        try {

            $this->connection = Connection::getInstance();

            return $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (\PDOException $ex) {

            throw $ex;
        }
    }

    public function updatePass($newpass, $token)
    {
        $query = "UPDATE users  SET password = :password WHERE token = :token";

        $parameters['token'] = $token;
        $parameters['password'] = $newpass;

        try {

            $this->connection = Connection::getInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (\PDOException $ex) {

            throw $ex;
        }
    }

    public function updateUser($email ,$name, $lastname, $password)
    {
        $query = "UPDATE users  SET name = :name, lastname = :lastname,  password = :password WHERE email = :email";

        $parameters['email'] = $email;
        $parameters['name'] = $name;
        $parameters['lastname'] = $lastname;
        $parameters['password'] = $password;


        try {

            $this->connection = Connection::getInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (\PDOException $ex) {

            throw $ex;
        }
    }

    public function generatePass()
    {
        $pass = uniqid(mt_rand(0, 9), false);
        return $pass;
    }

    public function generateToken($email)
	{
		$token = md5(uniqid(mt_rand(), false));	
        
        $query = "UPDATE users  SET token = :token WHERE email = :email";

        $parameters['email'] = $email;
        $parameters['token'] = $token;

        try {

            $this->connection = Connection::getInstance();

             $this->connection->ExecuteNonQuery($query, $parameters);

        } catch (\PDOException $ex) {

            throw $ex;
        }
        var_dump($token);
        return $token;
    }
    
    public function validarToken($token)
    {
        echo $token;

        return true;
    }
}


?>
