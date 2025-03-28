<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=ec_warframe','root','');
} catch (Exception $e) {
    $errors[] = "Erreur de connexion à la bdd {$e->getMessage()}";
}