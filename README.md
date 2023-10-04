# Projet Garage

Projet accessible sur https://garage.baptistegrauer.me/

## Description

Ce site est un de mes projets que j'ai réalisé lors de mon BTS SIO en 2023.

Il s'agit d'un site de location/réservation de voitures pour un petit garagiste. Il permet au garagiste d'ajouter, d'afficher, de modifier et de supprimer des voitures à réserver.

## Prérequis pour l'installation

- Un logiciel de type WAMP/LAMP pour créer un serveur web local

## Installation du projet

- Placez vous dans le dossier où vous souhaitez récupérer le projet puis clonez-le

```
git clone git@github.com:BaptisteGrauer/projet-garage.git
```

- Se rendre dans le dossier `code` puis modifiez le fichier `configuration.php` 
avec les informations de connexion à votre base de données, 
ainsi que le chemin absolu du répertoire des images pour le site.

Exemple :
```php
// Informations d'identification de la base de données :

    // Adresse du serveur MySQL :
    $serveur = "127.0.0.1"; // addresse IP de la base de donnée ou localhost

    // Nom d'utilisateur du serveur MySQL :
    $user = "root"; //Utilisation de root fortement déconseillée

    // Mot de passe utilisateur du serveur MySQL :
    $mdp = ""; //votre mot de passe

    // Le nom de la base de donnée à utiliser :
    $db = "garage"; 
    
// Variables diverses : 

    // Chemin absolu du dossier images (pour ajout images voitures), à modifier avec celui de votre ordinateur/serveur.
    $dir = "C:/laragon/www/projet-garage/images/voitures/";
```

