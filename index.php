<?php
// Inclusion de l'autoloader de Composer
require_once 'vendor/autoload.php';

    // Charger les variables d'environnement
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    error_reporting(E_ALL);
ini_set('display_errors', 1);

// Utilisation des classes avec les namespaces configurés dans le fichier composer.json
use App\Controllers\HomeController;
use App\Controllers\UserController;

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    // Créez une instance du contrôleur approprié en fonction de l'action
    switch ($action) {
        case 'home':
            $homeController = new HomeController();
            $homeController->index();
            break;

            case 'login':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $userController = new UserController();
                    $userController->login();
                } else {
                    $userController = new UserController();
                    $userController->login();
                    
                }
            break;
            case 'signin' :
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $userController = new UserController();
                $userController -> create();}
                else{
                    $userController = new UserController();
                    $userController -> create();
                }
                break;

        }
}else {
    
        $homeController = new HomeController();
        $homeController->index();
    }

?>
