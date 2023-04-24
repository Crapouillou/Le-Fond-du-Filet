<?php

namespace App\Controllers;

use App\Models\Users;
use Exception;
use App\Controllers\Security;



/**
 * *********Liste des méthodes******
 * create() : permet de créer un nouvel utilisateur dans la base de donnée
 * login() : permet à un utilisateur de se connecter à son profil
 * edit() : permet à un utilisateur de mettre à jour son profil
 * loginform() : permet d'afficher le formulaire de connexion à son profil
 * loggedform() : permet d'afficher le formulaire de mis à jour du profil
 * logout() : permet à un utilisateur de se déconnecter 
 * delete() : permet à un utilisateur de supprimer son profil 
 * show404() : redirige l'utilisateur vers la apge 404.php
 */ 
class UserController
{



    public function create()
    {
        // Vérifie si l'utilisateur est déjà connecté
        if (isset($_SESSION['handle'])) {
            header('Location: /../views/user/Home.php');
            exit();
        }

        // Vérifie si la requête est une méthode POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $handle = Security::sanitize($_POST['handle'] ?? '');
            $mail = Security::sanitize($_POST['mail'] ?? '');
            $password = Security::sanitize($_POST['password'] ?? '');
            $roles = Security::sanitize($_POST['roles'] ?? null);

            // Vérification de la correspondance des mots de passe
            $confirmpw = Security::sanitize($_POST['confirmpw'] ?? '');
            if ($password !== $confirmpw) {
                die("Les mots de passe ne correspondent pas");
            }


            // Création d'un nouvel utilisateur dans la base de données
            $user = new Users();

            $user->createUser($handle, $mail, $password, $roles); {
                header("Location: " . $_ENV['SITE_URL'] . "?action=home");
                exit();

            }
        } else {
            // Affiche la vue signin.php si la requête n'est pas une méthode POST
            require_once __DIR__ . '/../views/user/Signin.php';
        }
    }



    public function login()
    {
        $handle = Security::sanitize($_POST['handle']);
        $password = Security::sanitize($_POST['password']);

        $userModel = new Users();

        $user = $userModel->userLogin($handle, $password);

        // Vérifiez si l'utilisateur est valide
        if ($user) {
            // Si l'utilisateur est valide, définissez les variables de session

            $_SESSION['handle'] = $handle;
            $_SESSION['roles'] = $user['roles']; // Remplacez 'roles' par le nom de la colonne des rôles dans votre base de données
            $_SESSION['id_user'] = $user['id_user'];


            // Redirigez vers la page d'accueil ou la page appropriée
            header("Location: " . $_ENV['SITE_URL'] . "?action=home");
        } else {
            // Affichez un message d'erreur ou redirigez vers la page de connexion
            $_SESSION['flash'] = "Nom d'utilisateur ou mot de passe incorrect.";

            header("Location: " . $_ENV['SITE_URL'] . "?action=login");
        }
    }
    public function edit()
    {
        if (!isset($_SESSION['id_user'])) {
            die("Identifiant de l'utilisateur manquant");
        }

        $user_id = $_SESSION['id_user'];

        $handle = Security::sanitize($_POST['handle'] ?? '');
        $mail = Security::sanitize($_POST['mail'] ?? '');
        $password = Security::sanitize($_POST['password'] ?? '');
        $confirmpw = Security::sanitize($_POST['confirmpw'] ?? '');

        if ($password !== $confirmpw) {
            die("Les mots de passe ne correspondent pas");
        }

        $user = new Users();
        $user_id = $_SESSION['id_user'];
        $user->editUser($user_id, $handle, $mail, $password);
        $newUserData = $user->getUserById($user_id);
        $_SESSION['handle'] = $newUserData['handle'];

        header("Location: " . $_ENV['SITE_URL'] . "?action=home");
        exit();
    }


    public function loginform()
    {
        // Vérifier s'il y a un message d'erreur dans la session
        $errorMessage = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : null;
        require_once 'app/views/user/Login.php';
    }
    public function loggedform()
    {
        $errorMessage = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : null;
        require_once 'app/views/user/UserView.php';
    }


    public function logout()
    {


        if (isset($_SESSION['handle'])) {
            unset($_SESSION['handle']);
        }
        session_unset();
        session_destroy();

        require_once 'app/views/user/Home.php';
        exit();
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['id_user'])) {
                die("Identifiant de l'utilisateur manquant");
            }

            $user = new Users();
            $user->deleteUser($_SESSION['id_user']);

            // Déconnexion de l'utilisateur
            session_unset();
            session_destroy();

            header("Location: " . $_ENV['SITE_URL'] . "?action=login");
            exit();
        }
    }

    public function show404($message = null) {
        http_response_code(404);
        include_once 'views/404.php';
    }
}


