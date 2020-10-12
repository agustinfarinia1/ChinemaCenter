<?php

    /*
    use Config\Autoload as Autoload;
    use Models\Admin as Admin;

    require_once("Config/Autoload.php");
    
    $admin = new Admin();

    $admin->setFirstName("Pedro");
    $admin->setLastName("Perez");

    var_dump($admin);

    */

    require_once("Config/Autoload.php");

    use Repository\AdminRepository as AdminRepository;
    use Models\Admin as Admin;

    if($_POST)
    {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];

        $admin = new Admin();
        
        $admin->setFirstName($firstName);
        $admin->setLastName($lastName);

        $adminRepository = new $AdminRepository();

        $adminRepository->Add($admin);
    }

    header("location:index.php");
    
?>