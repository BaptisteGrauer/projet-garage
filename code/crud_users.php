<?php
include "configuration.php";

function connexion($nom, $mdp, $bdd)
{
  $sql = "SELECT mdp FROM utilisateurs WHERE nom='$nom'";
  $result = $bdd->query($sql);
  $row = $result->fetch_assoc();
  if ($result->num_rows == 0) {
    return false;
  }
  if ($mdp == $row['mdp']) {
    return true;
  } else {
    return false;
  }
}

function create_user($email, $nom, $mdp, $bdd)
{
  $sql = "INSERT INTO utilisateurs (email, nom, mdp) VALUES ('$email', '$nom', '$mdp')";

  if ($bdd->query($sql) === TRUE) {
    return "L'utilisateur $nom a été créé avec succès";
  } else {
    return "Erreur lors de la création de l'utilisateur: " . $bdd->error;
  }
}

function read_user_text($nom, $bdd)
{
  $sql = "SELECT * FROM utilisateurs WHERE nom='$nom'";
  $result = $bdd->query($sql);
  $row = $result->fetch_assoc();
  if ($result->num_rows != 0) {
    echo "<tr><td>" . $row['id_utilisateur'] . "</td><td>" . $row["email"] . "</td><td>" . $row["nom"] . "</td><td>" . $row["mdp"] . "</td><td>" . $row["admin"] ."</td></tr>";
  } else {
    return "Valeur invalide";
  }
}

function read_all_user_text($bdd)
{
  $sql = "SELECT * FROM utilisateurs";
  $result = $bdd->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row['id_utilisateur'] . "</td><td>" . $row["email"] . "</td><td>" . $row["nom"] . "</td><td>" . $row["mdp"] . "</td><td>" . $row["admin"] . "</td>";
    }
  } else {
    echo "Aucun utilisateur trouvé";
  }
}

function update_user($id, $nom, $email, $mdp, $bdd)
{
  $sql = "UPDATE utilisateurs SET nom='$nom', email='$email', mdp='$mdp' WHERE id_utilisateur=$id";
  if ($bdd->query($sql) === TRUE) {
    return "Enregistrement mis à jour avec succès";
  } else {
    return "Erreur lors de la mise à jour de l'enregistrement: " . $bdd->error;
  }
}

function delete_user($nom, $bdd)
{
  $sql = "DELETE FROM utilisateurs WHERE nom='$nom'";
    if ($bdd->query($sql) === TRUE) {
      return "Utilisateur supprimé avec succès";
    } else {
      return "Erreur lors de la suppression de l'utilisateur : " . $bdd->error;
    }
}
