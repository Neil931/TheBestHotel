<?php

// Paramètres de connexion à la base de données
$dbHost = '185.98.131.177';
$dbName = 'elysy1942386';
$dbUser = 'elysy1942386';
$dbPassword = 'sJ9!R@Mc_txe9yu';

// Tentative de connexion à la base de données
try {
    $dsn = "mysql:host={$dbHost};dbname={$dbName}";
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

?>