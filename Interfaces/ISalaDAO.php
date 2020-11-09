<?php
    namespace Interfaces;

    use Models\Sala as Sala;

    interface ISalaDao
    {
        function Add(Sala $sala);
        function GetAll();
        function Remove($id);
        function Edit(Sala $sala);
    }
?>