<?php
    namespace Controllers;


use Controllers\UserController as UserController;
use Models\User as User;
use Models\QR_BarCode as QR_BarCode;

      

class CompraController
    {       

        public function __construct()
        {
            
        } 

        public function Index($message = "")
        {

        }

        public function compraEntrada(){
            require_once(VIEWS_PATH."funcion-comprar.php");
        }

        public function validarCompra($costo,$cantidadEntradas,$numeroTarjeta,$fechaVencimiento,$cvv){
            if($numeroTarjeta >= 1000000000000000 && $numeroTarjeta <= 9999999999999999){
                if($fechaVencimiento > date("Y-m")){
                    if($cvv >= 100 && $cvv <= 999){ // PODRIAMOS MANDAR MAIL CON LA CONFIRMACION DEL PAGO
                        $texto =  $_SESSION["loggedUser"]->getLastName()." ".$_SESSION["loggedUser"]->getName()." ,Usted realizo una compra de  $ ".($cantidadEntradas * $costo)." pesos.<br> gracias por su compra.";
                        $controller = new UserController();

                        $url = FRONT_ROOT . 'Funcion/Cartelera';

                        $qr = new QR_BarCode();

                        $qr->url($url);
                        $rutaImagen = "./Views/img/qr.png";
                        $nombreImagen = "qr.png";
                        $qr->qrCode(200,$rutaImagen);
                      ?>  <img src="$rutaImagen"> <?php
                        $controller->enviarMail($_SESSION["loggedUser"]->getEmail(),"compra de entradas",$texto,$rutaImagen,$nombreImagen);
                    }
                    else{
                        echo "su cvv no funciona";
                    }
                }
                else{
                    echo "su tarjeta expiro";
                }
            }
            else{
                echo "su numero esta fuera de rango";
            }
            header("Location:" . FRONT_ROOT . 'Funcion/Cartelera' );   //REDIRECCIONA DE NUEVO A LA PAGINA ANTERIOR
        }
    }
?>