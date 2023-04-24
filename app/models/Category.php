<?php

namespace App\Models;

use PDO;
use Exception;
use App\Models\DbConnect;


/**
 * *********Liste des méthodes******
 * createCategory : créer une catégorie dans la base de données
 * getCategory : permet de récupérere toutes les catégories de la base de donnée
 */

class Category extends DbConnect{
    public function createCategory($categoryName) {
        $pdo = self::connect();
        $query = "INSERT INTO category (category_name) VALUES (:category_name)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':category_name' => $categoryName]);
    
        // Récupérer l'ID de la catégorie insérée
        $categoryId = $pdo->lastInsertId();
    
        return $categoryId;
    }
    public function getCategories()
{   $pdo = self::connect();
    $query = "SELECT * FROM category";
    
    $stmt= $pdo->prepare($query);
    $stmt->execute();

    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
}
}