<?php 
    namespace App\controllers;

    class BaseController{
        function view($path, $data = []){
            extract($data);

            require_once "./app/views/$path.php";
        }
        function page($path, $data = []){
            extract($data);       
            require_once "./app/admin/view/$path.php";
        }
    }
?>