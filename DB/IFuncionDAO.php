<?php
    namespace DB;

    use Models\Funcion as Funcion;

    interface IFuncionDAO
    {
        function Add(Funcion $nuevaFuncion);
        function GetAll();
        //function Remove($idFuncion);
    }
?>