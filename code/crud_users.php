<?php
include "configuration.php";

function connexion($nom, $mdp, $bdd) // Vérifie que les identifiants soient bons et procède à la connexion si c'est le cas (-> page connexion)
{
  $sql = "SELECT mdp FROM utilisateurs WHERE nom='$nom'";
  $result = $bdd->query($sql);
  $row = $result->fetch_assoc();
  if ($result->num_rows == 0) {
    return "L'utilisateur $nom n'existe pas";
  }
  if ($mdp == $row['mdp']) {
    gen_user_cookies($nom, $bdd);
  } else {
    return "Les identifiants sont incorrects, veuillez vérifier qu'ils soient valides";
  }
}

function gen_user_cookies($nom, $bdd) { // Génère les cookies d'authentifications de l'utilisateur (-> page connexion) (C'est pas la meilleure méthode mais c'est comme ça)
    // récupération de l'identifiant d'utilisateur
    $sql = "SELECT id_utilisateur FROM utilisateurs WHERE nom='$nom'";
    $result = $bdd->query($sql);
    $row = $result->fetch_assoc();
    $id = $row["id_utilisateur"];
    // récupération des droit de l'utilisateur
    $sql = "SELECT admin FROM utilisateurs WHERE nom='$nom'";
    $result = $bdd->query($sql);
    $row = $result->fetch_assoc();
    $admin = $row["admin"];
    setcookie('id',$id,time() + 365*24*3600);
    setcookie('nom',$nom,time() + 365*24*3600);
    setcookie('admin',$admin,time() + 365*24*3600);
    header('Location: /compte/compte.php');
    return;
}

function create_user($nom, $mdp, $bdd) // Ajoute un utilisateur dans la BDD (-> panneau admin / création de compte)
{
  $sql = "INSERT INTO utilisateurs (nom, mdp) VALUES ('$nom', '$mdp')";
  if ($bdd->query($sql) === TRUE) {
    return "L'utilisateur $nom a été créé avec succès";
  } else {
    return "Ce nom d'utilisateur est indisponible, veuillez en choisir un autre."; //. $bdd->error;
  }
}

function read_user_text($nom, $bdd) // Affiche les information d'un utilisateur (-> panneau admin / paramètres du compte)
{
  $sql = "SELECT * FROM utilisateurs WHERE nom='$nom'";
  $result = $bdd->query($sql);
  $row = $result->fetch_assoc();
  if ($result->num_rows != 0) {
    echo "<tr><td>" . $row['id_utilisateur'] . "</td><td>" . $row["nom"] . "</td><td>" . $row["mdp"] . "</td><td>" . $row["admin"] ."</td></tr>";
  } else {
    return "Valeur invalide";
  }
}

function read_all_user_text($bdd) // Affiche tout les utilisateurs ansi que toutes leurs informations (-> panneau admin)
{
  $sql = "SELECT * FROM utilisateurs";
  $result = $bdd->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row['id_utilisateur'] . "</td><td>" . $row["nom"] . "</td><td>" . $row["mdp"] . "</td><td>" . $row["admin"] . "</td>";
    }
  } else {
    echo "Aucun utilisateur trouvé";
  }
}

function update_user($id, $nom, $mdp, $bdd) // Met à jour les informations d'un utilisateur (-> panneau admin / paramètres utilisateur)
{
  $sql = "UPDATE utilisateurs SET nom='$nom', mdp='$mdp' WHERE id_utilisateur=$id";
  if ($bdd->query($sql) === TRUE) {
    return "Informations mises à jour avec succès";
  } else {
    return "Erreur lors de la mise à jour des informations: " . $bdd->error;
  }
}

function delete_user($nom, $bdd) // Supprime un utilisateur de la base de donnée (-> panneau admin / paramètres utilisateurs)
{
  $sql = "DELETE FROM utilisateurs WHERE nom='$nom'";
    if ($bdd->query($sql) === TRUE) {
      return "Utilisateur supprimé avec succès";
    } else {
      return "Erreur lors de la suppression de l'utilisateur : " . $bdd->error;
    }
}
