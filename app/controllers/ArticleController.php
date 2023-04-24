<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Controllers\Security;
use Exception;

/**
 * *********Liste des méthodes******
 * createarticle() : récupère les données du formulaire de création d'un article
 * createarticleform() : permet d'afficher le formulaire pour ajouter de nouveaux articles
 * allarticle() : permet de récupérer depusi la base de donnée tout les articles  
 * articledetails() : permet d'afficher la page d'un article 
 */
class ArticleController
{

    public function createarticle()
    {
        $articleModel = new Article();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'], $_POST['paragraph'], $_FILES['photo'], $_POST['alt'], $_POST['id_category'])) {
            $title = Security::sanitize($_POST['title']);
            $paragraph = Security::sanitize($_POST['paragraph']);
            $alt = Security::sanitize($_POST['alt']);
            $category = Security::sanitize($_POST['id_category']);
            var_dump($category);

            // Télécharger la photo dans un dossier prédéfini
            $uploadDir = 'public/uploads';
            $photoName = basename($_FILES['photo']['name']);
            $photoPath = $uploadDir . '/' . $photoName;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)) {
                $articleId = $articleModel->createArticle($title, $paragraph, $photoPath, $alt, $category);
                header("Location: " . $_ENV['SITE_URL'] . "?action=homeadmin");
                exit();
            } else {
                echo "Erreur lors du téléchargement de la photo.";
            }
        }
    }
    public function createarticleform()
    {

        $categoryModel = new Category();


        $categories = $categoryModel->getCategories();



        require_once 'app/views/admin/CreateArticle.php';
    }
    public function allarticle()
    {



        $articleModel = new Article();
        $categoryModel = new Category();

        $articles = $articleModel->getAllArticles();
        $categories = $categoryModel->getCategories();


        require_once 'app/views/user/AllArticle.php';
    }
    public function articledetails()
    {
        if (isset($_GET['id'])) {
            $articleId = $_GET['id'];
            $articleModel = new Article();
            $article = $articleModel->getArticleById($articleId);
            require_once('app/views/user/Article.php');
        } else {

            header("Location: " . $_ENV['SITE_URL'] . "?action=home");
            exit();
        }

    }
}