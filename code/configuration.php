<?php
// Variables à modifier en fonction du besoin

// informations d'identification de la base de données

$serveur = "127.0.0.1"; // Adresse du serveur MySQL
$user = "root"; // Nom d'utilisateur du serveur MySQL
$mdp = ""; // Mot de passe utilisateur du serveur MySQL
$db = "garage"; // Le nom de la base de donnée à utiliser
$bdd = new mysqli($serveur, $user, $mdp, $db); // ouverture de la session sur la bdd

// vérification de la connexion à la bdd
if ($bdd->connect_error) {
    die("La connexion à échouée : " . $bdd->connect_error);
}

// Chemin absolu du dossier images (pour ajout images voitures), à modifier avec celui de votre poste/serveur.
$dir = "C:/laragon/www/projet-garage/images/voitures/";
?>