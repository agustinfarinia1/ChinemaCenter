<?php
    namespace Repositories;

    use Models\Admin as Admin;

    interface abml
    {
        function add($Admin $admin);
        function getAll();
    }
?>