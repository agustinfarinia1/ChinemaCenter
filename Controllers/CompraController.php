<?php
    namespace Controllers;


use Controllers\UserController as UserController;
use DAODB\ComprasDAO as ComprasDAO;
use Models\QR_BarCode as QR_BarCode;
use Models\Compra as Compra;

      

class CompraController
    {       
        private $compraDAO;  
        public function __construct()
        {
            $this->compraDAO = new comprasDAO();
        } 

        public function Index($message = "")
        {

        }

        public function validarCompra($diaFuncion,$cine,$sala,$pelicula,$costo,$cantidadEntradas,$numeroTarjeta,$fechaVencimiento,$cvv){
            if($numeroTarjeta >= 1000000000000000 && $numeroTarjeta <= 9999999999999999){
                if($fechaVencimiento > date("Y-m")){
                    if($cvv >= 100 && $cvv <= 999){ // PODRIAMOS MANDAR MAIL CON LA CONFIRMACION DEL PAGO

                        $compra = new Compra();
                        $compra->setIdFuncion($_SESSION["idFuncion"]);
                        $compra->setFechaCompra(date("Y-m-d"));
                        $compra->setFechaFuncion($diaFuncion);
                        $compra->setEmail($_SESSION["loggedUser"]->getEmail());
                        $compra->setCantidad($cantidadEntradas);

                        var_dump($compra);

                        $this->compraDAO->add($compra);

                        $texto =  $_SESSION["loggedUser"]->getLastName()." ".$_SESSION["loggedUser"]->getName()." ,Usted realizo una compra de  $ ".($cantidadEntradas * $costo)." pesos en el cine $cine y en la sala $sala para ver la pelicula $pelicula.<br> gracias por su compra.";
                        $controller = new UserController();

                        $url = FRONT_ROOT . 'Funcion/Cartelera';

                        $qr = new QR_BarCode();

                        $qr->url($url);
                        $rutaImagen = "./Views/img/qr.png";
                        $nombreImagen = "qr.png";
                        $qr->qrCode(200,$rutaImagen);

                        echo $texto;

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
            //header("Location:" . FRONT_ROOT . 'Funcion/Cartelera' );   //REDIRECCIONA DE NUEVO A LA PAGINA ANTERIOR
        }
    }
?>