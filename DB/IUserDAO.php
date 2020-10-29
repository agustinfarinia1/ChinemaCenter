<?php
    namespace DB;

    use Models\User as User;

    interface IUserDAO
    {
        function getByUserName($userName);
    }
?>