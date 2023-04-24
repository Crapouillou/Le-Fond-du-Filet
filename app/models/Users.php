<?php

namespace App\Models;

use PDO;
use Exception;
use App\Models\DbConnect;


/**
 * *********Liste des méthodes******
 * createUser : créer un utilisateur dans la base de données
 * userLogin : permettre à un utilisateur de se connecter à son profil
 * editUser : permettre à un utilisateur de modifier son profil
 * deleteUser : permettre à un utilisateur de supprimer son profil
 * getUserById : récupérer l'id d'un utilisateur connecté a son profil
 */

class Users extends DbConnect
{
    public function createUser(  $pseudo,  $mail,  $password, $roles = false) {
      
      $pdo = self::connect();
      
              //Validation de l'email
              if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                throw new Exception('Email invalide');
            }
            echo "Mot de passe saisi (createUser) : " . $password . "<br>";
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    echo "Hachage du mot de passe (createUser) : " . $hashed_password . "<br>";

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
        ':password' =>$hashed_password,
        ':roles' => intval($roles)
      ]);
      
      
    }
    public function userLogin($handle, $password)
    {
        $pdo = self::connect();
        $req = $pdo->prepare("SELECT * FROM users WHERE handle = :handle");
        $req->execute(array(':handle' => $handle));
        $userlog = $req->fetch(PDO::FETCH_ASSOC);
        if (!$userlog) {
            throw new Exception('Utilisateur non trouvé');
        }
    
        
    
        if (!password_verify($password, $userlog['password'])) {
            throw new Exception('Mot de passe incorrect');
        }
    
        if ($userlog && password_verify($password, $userlog['password'])) {
            if ($userlog['roles'] == 1) {
                $_SESSION['admin'] = 1;
                $_SESSION['handle'] =$handle ;
                header("Location: " . $_ENV['SITE_URL'] . "?action=homeadmin");
                exit;
            }
        }
        return $userlog;
    }

    public function editUser($id_user, $handle, $mail, $password)
    {
        // Vérification que les variables sont définies avant de les utiliser
        if (!isset($id_user)) {
            die("Identifiant de l'utilisateur manquant");
        }
    
        $pdo = self::connect();
    
        $params = [];
        $sql = "UPDATE users SET ";
        if (!empty($handle)) {
            $sql .= "handle = :handle, ";
            $params[':handle'] = $handle;
        }
        if (!empty($mail)) {
            $sql .= "mail = :mail, ";
            $params[':mail'] = $mail;
        }
        if (!empty($password)) {
            $sql .= "password = :password, ";
            $params[':password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $sql = rtrim($sql, ', ');
        $sql .= " WHERE id_user = :id_user";
        $params[':id_user'] = $id_user;
    
        $req = $pdo->prepare($sql);
        $req->execute($params);
    }
    

public function deleteUser(int $id)
{
    $pdo = self::connect();

    $req = $pdo->prepare("DELETE FROM users WHERE id_user = :id");
    $req->execute([':id' => $id]);

    

}
public function getUserById($id_user)
{
    $pdo = self::connect();
    $req = $pdo->prepare("SELECT * FROM users WHERE id_user = :id_user");
    $req->execute(array(':id_user' => $id_user));
    $user = $req->fetch(PDO::FETCH_ASSOC);
    return $user;
}
}

