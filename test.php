<?php
require_once 'vendor/autoload.php';

use \app\models\DbConnect;
require_once 'app/models/DbConnect.php';


$dbConnect = new DbConnect();
$pdo = $dbConnect->connect();

// Maintenant, tu peux utiliser $pdo pour exécuter des requêtes SQL sur ta base de données.
