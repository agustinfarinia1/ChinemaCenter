<?php
    namespace Interfaces;

    use Models\Compra as Compra;

    interface IComprasDAO
    {
        function add(Compra $compra);
        function GetAll();
        //function Remove($id);
        //function Edit(Compra $compra);
    }
?>