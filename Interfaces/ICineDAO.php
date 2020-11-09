<?php
    namespace Interfaces;

    use Models\Cine as Cine;

    interface ICineDao
    {
        function Add(Cine $cine);
        function GetAll();
        function Remove($id);
        function Edit(Cine $cine);
    }
?>