<?php

namespace App\Controllers;

use App\Models\Category;
use App\Controllers\Security;
use Exception;

/**
 * *********Liste des méthodes******
 * submitcategory() : permet de crer une catégorie dans la base de données
 * categoryform() : permet d'afficher le formulaire pour créer une catégorie
 * 
 */

class CategoryController
{
    public function submitcategory()
    {
        $categoryName = Security::sanitize($_POST['category_name']);


        $articleModel = new Category();


        $categoryId = $articleModel->createCategory($categoryName);



        header("Location: " . $_ENV['SITE_URL'] . "?action=homeadmin");
        exit();
    }
    public function categoryform()
    {

        $categoryModel = new Category();

        // Récupérez les catégories
        $categories = $categoryModel->getCategories();
        $errorMessage = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : null;
        require_once 'app/views/admin/CategoryView.php';
    }

}

?>