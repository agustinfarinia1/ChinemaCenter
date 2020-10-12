<?php
    namespace Repositories;

    use Repositories\IAdminRepository as IAdminRepository
    use Models\Admin as Admin;

    class AdminRepository implements IAdminRepository
    {
        private $adminList = array();
        private $fileName;

        public function __construct()
        {
            $this->fileName = dirname(__DIR__)."/Data/students.json":
        }

        public function add($admin $admin)
        {
            $this->retrieveData();

            array_push($this->adminList, $admin);

            $this->saveData();
        }

        public function getAll()
        {
            $this->retrieveData();

            return $this->adminList;
        }

        private function saveData()
        {
            $arrayToEncode = array();
            
            foreach($this->adminList as $admin)
            {
                $valuesArray['firstName'] = $admin->getFirstName();
                $valuesArray['lastName'] =  $admin->getLastName();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents($this->fileName, $jsonContent);
        }

        private function retrieveData()
        {
            $this->adminList = array();

            if(file_exists($this->fileName))
            {
                $jsonContent = file_get_contents($this->fileName);

                $arrayToEncode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                $admin = new Admin();

                foreach($arrayToEncode as $valuesArray)
                {
                    $admin->setFirstName($valuesArray['firstName']);
                    $admin->setLastName($valuesArray['lastName']);

                    array_push($this->adminList, $admin);
                }
            }
        }

    }
?>