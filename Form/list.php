<?php
    require_once("Config/Autoload.php");

    use Repository\AdminRepository as AdminRepository;
    use Models\Admin as Admin;

    $adminRepository = new AdminRepository();
    $adminList = $adminList->getAll();
?>

<html>
    <head>
        <body>
            <table>
                <tr>
                    <th> Nombre </th>
                    <th> Apellido </th>
                </tr>
                <?php
                    foreach($adminList as $admin)
                    {
                        ?>
                            <tr>
                                <td> <?php echo $admin->getFirstName() ?></td>
                                <td> <?php echo $admin->getLastName() ?></td> 
                            </tr>
                        <?php
                    }
                ?>
            </table>
            <a href="index.php"> Volver </a>
        </body>
    </head>
</html>