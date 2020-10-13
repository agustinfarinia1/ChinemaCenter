<?php

    use Config\Autoload as Autoload;
    use Models\Admin as Admin;

    require_once("Config/Autoload.php");
    
    $admin = new Admin();

    $admin->setFirstName("Pedro");
    $admin->setLastName("Perez");

    var_dump($student);
?>