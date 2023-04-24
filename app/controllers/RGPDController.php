<?php

namespace App\Controllers;


use Exception;
/**
 * *********Liste des méthodes******
 * cookies() : permet d'afficher la vue relative aux cookies situé dans le footer
 * personnaldate() : permet d'afficher la vue relative aux données perosnnelles du footer
 */ 

class RGPDController{
    public function cookies(){
        $errorMessage = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : null;
        require_once 'app/views/user/Cookies.php';
    }
    public function personnaldata(){
        $errorMessage = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : null;
        require_once 'app/views/user/PersonnalData.php';
    }
}