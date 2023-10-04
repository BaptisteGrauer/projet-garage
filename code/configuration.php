<?php
// Ceci est le fichier de configuration pour ce site.
// Les variables ci-dessous sont à modifier et doivent correspondre à votre configuration actuelle.

// Informations d'identification de la base de données :

    // Adresse du serveur MySQL :
    $serveur = "127.0.0.1"; 

    // Nom d'utilisateur du serveur MySQL :
    $user = "root"; 

    // Mot de passe utilisateur du serveur MySQL :
    $mdp = ""; 

    // Le nom de la base de donnée à utiliser :
    $db = "garage"; 

    // Ouverture de la session sur la base de données :
    $bdd = new mysqli($serveur, $user, $mdp, $db); 

    // Vérification de la connexion à la base de donnée :
    if ($bdd->connect_error) {
        die("La connexion à la base de donnée à échouée : <br>" . $bdd->connect_error);
    }

// Variables diverses : 

    // Chemin absolu du dossier images (pour ajout images voitures), à modifier avec celui de votre ordinateur/serveur.
    $dir = "C:/laragon/www/projet-garage/images/voitures/";
?>