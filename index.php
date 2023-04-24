<?php

// Chargement de l'autoloader de Composer
require_once 'vendor/autoload.php';


use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
try {
    $dotenv->load();
    // echo 'connexion réussie';
} catch (\Dotenv\Exception\InvalidPathException $e) {
    die('Impossible de charger le fichier .env : ' . $e->getMessage());
}

//Vérifier si une session existe déjà
if (!isset($_SESSION)) {
    session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Utilisation des classes avec les namespaces configurés dans le fichier composer.json
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\ArticleController;
use App\Controllers\CategoryController;
use App\Controllers\RGPDController;
use App\Controllers\ContactController;
// Définir les actions valides
$validActions = [
    'home', 'login', 'signin', 'registration', 'logout',
    'edituser', 'createarticleform', 'createarticle', 'categoryform',
    'createcategory', 'allarticle', 'articledetails', 'personnaldata',
    'cookies', 'contact', 'homeadmin', 'delete'
];

// Vérifier si l'action est valide


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
                $userController->loginform();
            }
            break;

        case 'signin':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $userController = new UserController();
                $userController->create();
            } else {
                $userController = new UserController();
                $userController->create();
            }
            break;

        case 'registration':
            $userController = new UserController();
            $userController->loggedform();
            break;
        case 'logout':

            $userController = new UserController();
            $userController->logout();
            

        case 'edituser':
            $userController = new UserController();
            $userController->edit();
        case 'createarticleform':
            $articleController = new articleController();
            $articleController->createarticleform();
            break;
        case 'createarticle':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $articleController = new articleController();
                $articleController->createarticle();
            } else {
                $articleController = new articleController();
                $articleController->createarticleform();
            }

            break;


        case 'categoryform':
            $categoryController = new categoryController();
            $categoryController->categoryform();
            break;

        case 'createcategory':
            $categoryController = new categoryController();
            $categoryController->submitcategory();
            break;

        case 'allarticle':
            $articleController = new articleController();
            $articleController->allarticle();
            break;

        case 'articledetails':
            $articleController = new articleController();
            $articleController->articledetails();
            break;

        case 'personnaldata':
            $rgpdController = new RGPDController();
            $rgpdController->personnaldata();
            break;

        case 'cookies':
            $rgpdController = new RGPDController();
            $rgpdController->cookies();
            break;

        case 'contact':

            $contactController = new contactController();
            $contactController->contact();
            break;
            
        case 'homeadmin':
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                $homeController = new HomeController();
                $homeController->homeadmin();
            } else {
                $homeController = new HomeController();
                $homeController->index();
                break;
            }
            break;


        case 'delete':
            $userController = new UserController();
            $userController->delete();
            break;

        case 'notfound':
            $userController = new UserController();
           
           $userController->show404("La page que vous recherchez n'existe pas.");
                break;


    default:
    // Si la route n'est pas trouvée, afficher une erreur 404
    $userController = new UserController();
    $userController->show404();
    break;
}


} else {

    $homeController = new HomeController();
    $homeController->index();
    
}

?>