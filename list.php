<?php
    require_once("Config/Autoload.php");

    use Repository\AdminRepository as AdminRepository;
    use Models\Admin as Admin;

    $adminRepository = new AdminRepository();
    $adminList = $adminRepository->getAll();
    
?>

<html>
    <head>
        <title> Persistencia con JSON </title>
    </head>
        <body>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
                <?php
                    foreach($adminList as $admin)
                    {
                        ?>
                            <tr>
                                <td><?php echo $admin->getFirstName() ?></td>
                                <td><?php echo $admin->getLastName() ?></td> 
                            </tr>
                        <?php
                    }
                ?>
            </table>
            <br>
            <a href="index.php"> Volver </a>
        </body>
</html>