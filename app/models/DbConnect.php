<?php
namespace App\Models;

use PDO;
use Dotenv\Dotenv;

 class DbConnect
{
    private $host ;
    private $port;
    private $dbname ;
    private $username ;
    private $password ;
    /**
 * *********Liste des méthodes******
 * connect () : permet la& connexion à la abse donnée
 */ 
    public function __construct()
    {
 

        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->port = $_ENV['DB_PORT'];
    }
    public function connect()
    {
        if (isset($this->port)&& !empty($this->port)){
            $stringPort = ":".$this -> port;
        }else{
            $stringPort = "";
        }
        $dsn = "mysql:host=$this->host".$stringPort.";dbname=$this->dbname;charset=utf8mb4";

        try {
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $pdo;
        } catch (\PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
        }
        return null;
    }
}