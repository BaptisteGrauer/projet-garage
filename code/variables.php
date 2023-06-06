<?php
// Variables à modifier en fonction du besoin

// informations d'identification de la base de données

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "garage";
$conn = new mysqli($servername, $username, $password, $dbname);

// vérification de la connexion à la bdd
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Chemin absolu du dossier images (pour ajout images voitures), à modifier avec celui de votre poste/serveur.
$dir = "C:/laragon/www/projet-garage/images/voitures/";
?>