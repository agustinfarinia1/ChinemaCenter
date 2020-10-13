<?php
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

        $adminRepository = new AdminRepository();

        $adminRepository->add($admin);
    }

    header("location:index.php");
    
?>