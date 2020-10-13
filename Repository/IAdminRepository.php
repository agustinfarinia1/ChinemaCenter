<?php
    namespace Repository;

    use Models\Admin as Admin;

    interface IAdminRepository
    {
        function add(Admin $admin);
        function getAll();
    }
?>