<?php
namespace App\Models;

use PDO;
use Exception;
use App\Models\DbConnect;

/**
 * ********Liste des méthodes*****************
 * createArticle : créer un article et insère son contenu dans une table paragraph et son titre dans un table article et la photo dans une table articlepicture
 * getArticleById : récupère le contenu d'un article par son id
 * getArticleByTitle : récupère un article par son title
 * get3LatestArticles() : permet d'afficher les 3 derniers articles insérer dans la base de données
 *  getLatestArticles() : permet de récupérer les 12 derniers articles insérer dans la base de données
 * getAllArticles() : permet de récupérer tout les articles de la base de donnée
 */

class Article extends DbConnect
{

    // fonction permettant de créer un nouvel article
    public function createArticle($title, $paragraph, $photoPath, $alt, $category)
    {
        $pdo = self::connect();

        // Insérer l'article dans la table 'article' avec l'ID de la catégorie
        $query1 = "INSERT INTO article (title, id_category) VALUES (:title, :id_category)";
        $stmt1 = $pdo->prepare($query1);
        $stmt1->execute([':title' => $title, ':id_category' => $category]);

        // Récupérer l'ID de l'article inséré
        $articleId = $pdo->lastInsertId();

        // Insérer la photo dans la table 'articlepicture' avec l'ID de l'article
        $query2 = "INSERT INTO articlepicture (id_article, photo_link, alt) VALUES (:id_article, :photo_link, :alt)";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute([':id_article' => $articleId, ':photo_link' => $photoPath, ':alt' => $alt]);

        // Récupérer l'ID de la photo insérée
        $photoId = $pdo->lastInsertId();

        // Insérer le paragraphe dans la table 'paragraph' avec l'ID de l'article
        $query3 = "INSERT INTO paragraph (id_article, content) VALUES (:id_article, :content)";
        $stmt3 = $pdo->prepare($query3);
        $stmt3->execute([':id_article' => $articleId, ':content' => $paragraph]);



        return $articleId;
    }


    public function getArticleById($articleId)
    {
        $db = self::connect();
        $query = "SELECT a.*, p.content as paragraph, ap.photo_link as photo_link, ap.alt as photo_alt
        FROM article a 
        LEFT JOIN paragraph p ON a.id_article = p.id_article
        LEFT JOIN articlepicture ap ON a.id_article = ap.id_article
        WHERE a.id_article = :id_article";
        $stmt = $db->prepare($query);
        $stmt->execute([':id_article' => $articleId]);
        $article = $stmt->fetch(PDO::FETCH_ASSOC);
        return $article;
    }


    public function get3LatestArticles(): array
    { {
            $db = self::connect();

            $query = "SELECT a.*, ap.photo_link as photo_link, ap.alt as alt
            FROM article a
            LEFT JOIN articlepicture ap ON a.id_article = ap.id_article
            ORDER BY a.id_article DESC
            LIMIT 3";
            $req = $db->query($query);
            $articles = $req->fetchAll(PDO::FETCH_ASSOC);

            return $articles;
        }
    }

    public function getLatestArticles()
    {
        $db = self::connect();

        $query = "SELECT a.*, ap.photo_link as photo_link, ap.alt as alt
        FROM article a
        LEFT JOIN articlepicture ap ON a.id_article = ap.id_article
        ORDER BY a.id_article DESC
        LIMIT 12";
        $req = $db->query($query);
        $articles = $req->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }

    public function getAllArticles()
    {
        $db = self::connect();

        $query = "SELECT a.*, ap.photo_link as photo_link, ap.alt as alt
        FROM article a
        LEFT JOIN articlepicture ap ON a.id_article = ap.id_article";

        $req = $db->query($query);
        $articles = $req->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }
}


?>