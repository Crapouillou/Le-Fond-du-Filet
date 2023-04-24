<?php

namespace App\Controllers;
use App\Models\Article;

/**
 * *********Liste des méthodes******
 * index() : permet d'afficher la vue Home.php
 * homeadmin() : permet d'afficher la vue HomeAdmin
 */

class HomeController
{
    public function index($errorMessage = null)
    {   
        $articleModel = new Article();
        $articles = $articleModel->getlatestarticles();
        $sliderArticles = $articleModel->get3LatestArticles(); 
    
        require_once __DIR__ . '/../views/user/Home.php';
    }

    public function homeadmin()
    {



        require_once 'app/views/admin/HomeAdmin.php';
    }
}
?>