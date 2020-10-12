<?php

    use Models\Admin as Admin;

    require_once("Config/Autoload.php");
    require_once("Models/Admin.php");

    $admin = new Admin();

    $admin->setFirstName("Pedro");
    $admin->setLastName("Perez");

    var_dump($student);
?>