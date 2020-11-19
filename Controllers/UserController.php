<?php

namespace Controllers;

//use DAOJSON\UserDAO as UserDAO;
use DAODB\UserDAO as UserDAO;
use Models\User as User;
use Models\PHPMailer as PHPMailer;
use Models\SMTP as SMTP;
use Models\Exception as Exception;
use DAODB\Connection as Connection;


class UserController
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
        
    }

    public function crear($name, $lastname, $email, $password)
    {

        $errors = array();

        $user = new User();
        $user->setName($name);
        $user->setLastname($lastname);

      
            if (!$this->userDAO->GetByEmail($email)) {
                $user->setEmail($email);

            } else {
                $errors[] = "el usuario ya existe";
            }
        

        if (!$this->userDAO->minMaxPassword(6, 14, $password)) {
            $user->setPassword($password);
        } else {
            $errors[] = "la contraseña debe complir con la dimension especificada";
        }

        try {
            $this->userDAO->add($user);
        } catch (\PDOException $ex) {

            foreach ($errors as $error)
            {
                echo $error;
            }
            $ex->getMessage();
        }

        require_once(VIEWS_PATH . "home.php");
    }


    public function Login($email = null, $password = null)
    {
        $user = $this->userDAO->GetByEmail($email);

        if ($user) {

            if (($user != null) && ($user->getPassword() === $password)) {
                $_SESSION["loggedUser"] = $user;
                header("Location: " . FRONT_ROOT);
            } else {
                $this->Logout();
                //echo "<script> alert('Contraseña incorrecta');</script>";


            }
        } else {
            $this->Logout();
           // echo "<script> alert('El email que ingreso no se encuentra registrado');</script>";
        }
    }


    public function Logout()
    {
        session_destroy();
        require_once(VIEWS_PATH . "home.php");
    }

    public function RecuperarCuenta($email)
    {    // envia un mail al usuario que solicito la recuperacion
        $token= $this->userDAO->generateToken($email);
        echo "soy token" .$token;
        $url = "localhost". FRONT_ROOT . "User/restablecerPass/".$token;
        $this->enviarMail($email, "Recuperacion de cuenta", "Usted ha solicitado una recuperacion de cuenta, clickee el siguiente link para continuar <br> <a href='".$url."'> Clickee aqui</a>", "Views/img/qr.png"); 
    }

    public function restablecerPass($token)
    {    // envia un mail al usuario que solicito la recuperacion
        
        if ($this->userDAO->validarToken($token))
        {
            include_once(VIEWS_PATH . "user-nuevo-pass.php");
        }
        else
        {
            include_once(VIEWS_PATH . "home.php");
        }
    }

    public function newPass($newpass, $token)
    {
        try {
            $this->userDAO->updatePass($newpass, $token);

            require_once(VIEWS_PATH."home.php");
            
        } catch (Exception $ex) {
            throw $ex;
        }
        
    }

    public function updateUser($email ,$name, $lastname, $password)
    {
        try {
            
            $this->userDAO->updateUser($email ,$name, $lastname, $password);

            require_once(VIEWS_PATH."home.php");
            
        } catch (Exception $ex) {
            throw $ex;
        }
        
    }

    public function verPerfil()
    {
            require_once(VIEWS_PATH."perfil-user.php");
    }


    public function enviarMail($email = "", $encabezado = "", $texto = "", $imagen = null)
    {   // Envia un mail con los datos pasados por parametro
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = USERNAME_MAIL;                     // SMTP username
            $mail->Password   = PASSWORD_MAIL;                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom(USERNAME_MAIL, 'ChinemaCenter');
            $mail->addAddress($email);

            // Attachments
            if ($imagen) {
                $mail->addAttachment($imagen, "qr.png");         // Add attachments
            }

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $encabezado;
            $mail->Body    = $texto;

            $mail->send();
            include_once(VIEWS_PATH . "home.php");
        } catch (Exception $e) {
            echo "Se produjo un error: {$mail->ErrorInfo}";
        }
    }


}