<?php

namespace App\Controllers;


use Exception;

/**
 * *********Liste des méthodes******
 * contact() : permet d'afficher le formulaire de contact
 */

class ContactController
{
    public function contact()
    {
        $errorMessage = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : null;
        require_once 'app/views/user/Contact.php';
    }
}