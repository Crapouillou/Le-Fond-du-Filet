<?php
namespace App\Models;

use PDO;
use Exception;
use App\Models\DbConnect;

/**
 * ********Liste des méthodes*****************
 * createArticle : créer un article et insère son contenu dans une table paragraph et son titre dans un table article
 * getArticleById : récupère le contenu d'un article par son id
 * getArticleByTitle : récupère un article par son title
 */

class Article extends DbConnect
{

    // fonction permettant de créer un nouvel article
    public function createArticle(string $title, string $content)
    {
        $db = self::connect();

        // Insertion du nouvel article
        $req = $db->prepare(
            "INSERT INTO article (
                title
            ) 
            VALUES (?)"
        );

        $req->execute([$title]);

        // Récupération de l'ID de l'article inséré
        $articleId = $db->lastInsertId();

        // Insertion des paragraphes dans la table paragraph
        $paragraphs = explode("\n", $content);

        foreach ($paragraphs as $paragraph) {
            $req = $db->prepare(
                "INSERT INTO paragraph (
                    content, 
                    id_article
                ) 
                VALUES (?, ?)"
            );

            $req->execute([$paragraph, $articleId]);
        }
    }

    public function getArticleById(int $id): array
    {
        $db = self::connect();

        $req = $db->prepare("SELECT * FROM article WHERE id_article = ?");
        $req->execute([$id]);
        $article = $req->fetch(PDO::FETCH_ASSOC);

        if (!$article) {
            echo "Pas d'article trouvé"; // Article non trouvé
        }
        $req = $db->prepare("SELECT * FROM paragraph WHERE id_article = ?");
        $req->execute([$id]);
        $paragraphs = $req->fetchAll(PDO::FETCH_ASSOC);

        // Affichage du titre et du contenu de l'article
        echo "<h1>" . $article['title'] . "</h1>";

        foreach ($paragraphs as $paragraph) {
            echo "<p>" . $paragraph['content'] . "</p>";
        }

        return $article;
    }
    public function getArticleByTitle(string $title): array
    {
        $db = self::connect();

        $req = $db->prepare("SELECT * FROM article WHERE title = ?");
        $req->execute([$title]);
        $article = $req->fetch(PDO::FETCH_ASSOC);

        return $article;
    }



    public function getLatestArticles(): array
    {
        $db = self::connect();

        $req = $db->query("SELECT * FROM article ORDER BY id_article DESC LIMIT 12");
        $articles = $req->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }
    public function getAllArticles(): array
    {
        $db = self::connect();

        $req = $db->query("SELECT * FROM article");
        $articles = $req->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }
}


?>