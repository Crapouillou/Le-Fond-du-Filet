<?php

namespace App\Controllers;

use App\Models\Users;
use Exception;

class UserController
{


    
    public function create()
    {
        // Vérifie si l'utilisateur est déjà connecté
        if(isset($_SESSION['handle'])){
            header('Location: /../views/Home.php');
            exit();
        }
    
        // Vérifie si la requête est une méthode POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $handle = htmlspecialchars($_POST['handle'] ?? '');
            $mail = htmlspecialchars($_POST['mail'] ?? '');
            $password = htmlspecialchars($_POST['password'] ?? '');
            $roles = $_POST['roles'] ?? null;
    
            // Vérification de la correspondance des mots de passe
            $confirmpw = htmlspecialchars($_POST['confirmpw'] ?? '');
            if ($password !== $confirmpw) {
                die("Les mots de passe ne correspondent pas");
            }
    
            // Cryptage du mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
            // Création d'un nouvel utilisateur dans la base de données
            $user = new Users();
    
            if ($user->createUser($handle, $mail, $hashed_password, $roles)) {
                header('Location: /../views/Home.php');
                echo "Compte utilisateur créé avec succès";
                exit();
            } else {
                echo "Erreur lors de l'enregistrement de l'utilisateur";
                exit();
            }
        } else {
            // Affiche la vue signin.php si la requête n'est pas une méthode POST
            require_once __DIR__ . '/../views/Signin.php';
        }
    }



    public function login()
    {
        // Vérifie si l'utilisateur est déjà connecté
        if(isset($_SESSION['handle'])){
            header('Location: ../views/UserView.php');
            exit();
        }
    
        // Vérifie si la requête est une méthode POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $handle = htmlspecialchars($_POST['handle'] ?? '');
            $password = htmlspecialchars($_POST['password'] ?? '');
    
            $user = new Users();
                
            try {
                $userLogin = $user->loginUser($handle, $password);
                session_start();
                $_SESSION['handle'] = $userLogin['handle'];
    
                header('Location: ../views/Home.php');
                exit();
            }
            catch (Exception $e){
                echo $e->getMessage();
            }
        }
        else {
            // Affiche la vue login.php si la requête n'est pas une méthode POST
            require_once __DIR__ . '/../views/Login.php';
        }
    }


    public function logout()
{
    
    
    if (isset($_SESSION['handle'])) {
        unset($_SESSION['handle']);
    }
    session_destroy();
    
    header("Location: /../models/index.php");
    exit();
}




}

