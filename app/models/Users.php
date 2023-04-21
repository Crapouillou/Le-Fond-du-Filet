<?php

namespace App\Models;

use PDO;
use Exception;
use App\Models\DbConnect;


/**
 * *********Liste des méthodes******
 * createUser : créer un utilisateur dans la base de données
 * loginUser : permettre à un utilisateur de se connecter à son profil
 * editUser : permettre à un utilisateur de modifier son profil
 * deleteUser : permettre à un utilisateur de supprimer son profil
 * getLoggedInUserId : récupérer l'id d'un utilisateur connecté a son profil
 * isLoggedIn : permet de vérifier si un utilisateur est connecté ou non
 */

class Users extends DbConnect
{
    public function createUser( string $pseudo, string $mail, string $password, $roles = null) {
      
      $pdo = self::connect();
      
              //Validation de l'email
              if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                throw new Exception('Email invalide');
            }
      $req = $pdo->prepare(
        "INSERT INTO 
            users(
                
                handle,
                mail,
                `password`,
                roles
                )
        VALUES (:handle, :mail, :password, :roles)"
      );
      $req->execute([
        
        ':handle' =>$pseudo,
        ':mail' => $mail,
        ':password' =>password_hash($password, PASSWORD_DEFAULT),
        ':roles' => $roles
      ]);
      return true;
    }
    public function loginUser(string $pseudo, string $password)
{
    $pdo = self::connect();

    $req = $pdo->prepare("SELECT * FROM users WHERE handle = :handle");
    $req->execute([':handle' => $pseudo]);
    $user = $req->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($password, $user['password'])) {
        
    }

    return $user;
    

}
public function getUserByHandle(int $handle): array
{
    $pdo = self::connect();
    
    $req = $pdo->prepare("SELECT * FROM users WHERE handle = ?");
    $req->execute([$handle]);
    $user = $req->fetch(PDO::FETCH_ASSOC);

    return $user;
}
public function editUser(int $id, string $handle, string $mail, string $password)
{
    $pdo = self::connect();

    $req = $pdo->prepare(
        "UPDATE users
        SET handle = :handle, mail = :mail, password = :password
        WHERE id = :id"
    );
    $req->execute([
        ':id' => $id,
        ':handle' => $handle,
        ':mail' => $mail,
        ':password' => password_hash($password, PASSWORD_DEFAULT),
    ]);

    // Mettre à jour les informations de session si nécessaire
}
public function deleteUser(int $id)
{
    $pdo = self::connect();

    $req = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $req->execute([':id' => $id]);

    // Supprimer les informations de session si nécessaire
}
public function isLoggedIn() {
    if(!isset($_SESSION['handle'])) {
        header("Location: /login.php");
        exit();
    }
}

private function getLoggedInUserId() {
    $user = new Users();
    $userDetails = $user->getUserByHandle($_SESSION['handle']);
    return $userDetails['id'];
}
}
