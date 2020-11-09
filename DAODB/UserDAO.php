<?php
    namespace DAODB;

    use Interfaces\IUserDAO as IUserDAO;
    use DAODB\Connection as Connection;
    //use DAODB\QueryType as QueryType;
    use Models\User as User;

    class UserDAO implements IUserDAO
    {
        private $connection; 
        private $tableName = "users"; 

        public function GetByUserName($userName)
        {
            $user = null;

            $query = "SELECT name, userName, password, rol FROM ".$this->tableName." WHERE (userName = :userName)";

            $parameters["userName"] = $userName;

            $this->connection = Connection::GetInstance();

            $results = $this->connection->Execute($query, $parameters);

            foreach($results as $row)
            {
                $user = new User();
                $user->setName($row["name"]);
                $user->setUserName($row["userName"]);
                $user->setPassword($row["password"]);
                $user->setRol($row["rol"]);
            }            
           
            return $user;
        }  
    }
?>