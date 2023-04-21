<?php

    namespace App\Controllers;

    class HomeController
    {
        public function index($errorMessage = null)
        {
            require_once __DIR__ . '/../views/home.php';
        }
    }

?>