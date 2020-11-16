<?php
    namespace Controllers;


use Controllers\UserController as UserController;
use DAODB\ComprasDAO as ComprasDAO;
use Models\QR_BarCode as QR_BarCode;
use Models\Compra as Compra;
use DAODB\FuncionDAO as FuncionDAO;

      

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

        public function validarCompra($diaFuncion,$cine,$sala,$pelicula,$costo,$cantidadEntradas,$tipoTarjeta,$numeroTarjeta,$fechaVencimiento,$cvv){
            $minimoNumeroEntrada = 0;
            $maximoNumeroEntrada = 0;
            switch ($tipoTarjeta) {
                case 0:
                    $minimoNumeroEntrada = 4000000000000000;
                    $maximoNumeroEntrada = 4999999999999999;
                    break;
                case 1:
                    $minimoNumeroEntrada = 2000000000000000;
                    $maximoNumeroEntrada = 2999999999999999;
                    break;              
            }
            $mensaje = "";
            $op = 2;
            if($numeroTarjeta >= $minimoNumeroEntrada && $numeroTarjeta <= $maximoNumeroEntrada){
                if($fechaVencimiento > date("Y-m")){
                    if($cvv >= 100 && $cvv <= 999){ // PODRIAMOS MANDAR MAIL CON LA CONFIRMACION DEL PAGO
                        $compra = new Compra();
                        $compra->setIdFuncion($_SESSION["idFuncion"]);
                        $compra->setFechaCompra(date("Y-m-d"));
                        $compra->setFechaFuncion($diaFuncion);
                        $compra->setIdUsuario($_SESSION["loggedUser"]->getId());
                        $compra->setCantidad($cantidadEntradas);

                        $dao = new FuncionDAO();
                        $arreglo = array();
                        $arreglo = $dao->lugaresEnSala($compra->getIdFuncion(),$diaFuncion);

                        if($arreglo[1] - ($compra->getCantidad() + $arreglo[0]) >= 1)
                        {
                            $op = 1;
                            $mensaje = "Su-compra-se-realizo-con-exito";
                            $this->compraDAO->add($compra);

                            $texto =  $_SESSION["loggedUser"]->getLastName()." ".$_SESSION["loggedUser"]->getName()." ,Usted realizo una compra de  $ ".($cantidadEntradas * $costo)." pesos en el cine $cine y en la sala $sala para ver la pelicula $pelicula.<br> gracias por su compra.";
                            $controller = new UserController();

                            $url = FRONT_ROOT . 'Funcion/Cartelera';

                            $qr = new QR_BarCode();

                            $qr->url($url);
                            $rutaImagen = "./Views/img/qr.png";
                            $nombreImagen = "qr.png";
                            $qr->qrCode(200,$rutaImagen);

                            $controller->enviarMail($_SESSION["loggedUser"]->getEmail(),"compra de entradas",$texto,$rutaImagen,$nombreImagen);
                        }
                        else{
                            $mensaje = "la-capacidad-de-la-funcion-esta-sobrepasada";
                        }
                    }
                    else{
                        $mensaje = "su-cvv-no-funciona";
                    }
                }
                else{
                    $mensaje = "su-tarjeta-expiro";
                }
            }
            else{
                $mensaje = "su-numero-esta-fuera-de-rango";
            }
            var_dump($op);
            header("Location:" . FRONT_ROOT . 'Funcion/getFuncionPorId/'.$_SESSION["idFuncion"].'/'.$op.'/'.$mensaje );   //REDIRECCIONA DE NUEVO A LA PAGINA ANTERIOR
        }
    }
?>