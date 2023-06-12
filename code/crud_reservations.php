<?php
include "configuration.php";

function create_reservation($id_voiture, $id_utilisateur, $date_reservation, $bdd)
{
  $sql = "INSERT INTO reservations (id_voiture, id_utilisateur, date_reservation) VALUES ('$id_voiture', '$id_utilisateur', '$date_reservation')";

  if ($bdd->query($sql) === TRUE) {
    return "Réservation créée avec succès";
  } else {
    return "Erreur lors de la réservation : " . $bdd->error;
  }
}

function read_all_reservation($bdd)
{
  $sql = "SELECT * FROM reservations";
  $result = $bdd->query($sql);
  if ($result->num_rows > 0) {
    // parcourir les résultats de la requête
    while ($row = $result->fetch_assoc()) {
      // Récupération marque et modèle de la voiture
      $id_voiture = $row['id_voiture'];
      $sql_v = "SELECT marque,modele FROM voitures WHERE id_voiture='$id_voiture'";
      $result_v = $bdd->query($sql_v);
      $row_v = $result_v->fetch_assoc();
      // Récupération nom utilisateur
      $id_utilisateur = $row['id_utilisateur'];
      $sql_u = "SELECT nom FROM utilisateurs WHERE id_utilisateur='$id_utilisateur'";
      $result_u = $bdd->query($sql_u);
      $row_u = $result_u->fetch_assoc();
      echo "<tr><td>" . $row["id_reservation"] . "</td><td>" . $row_u['nom'] . "</td><td>" . $row_v['marque'] . " " . $row_v['modele'] . "</td><td>" . $row["date_reservation"] . "</td></tr>";
    }
  } else {
    echo "Aucune réservation trouvée";
  }
}

function read_all_reservation_user($id_utilisateur, $bdd)
{
  $sql = "SELECT * FROM reservations WHERE id_utilisateur='$id_utilisateur'";
  $result = $bdd->query($sql);
  if ($result->num_rows > 0) {
    // parcourir les résultats de la requête
    while ($row = $result->fetch_assoc()) {
      // Récupération marque et modèle de la voiture
      $id_voiture = $row['id_voiture'];
      //echo "Réservation N°" . $row["id_reservation"] . " :";
      read_voiture_id($id_voiture, $bdd);
    }
  } else {
    echo "Aucune réservation trouvée";
  }
}

function update_reservation($id_reservation, $id_voiture, $id_utilisateur, $date_reservation, $bdd)
{
  $sql = "UPDATE utilisateurs SET id_voiture='$id_voiture', id_utilisateur='$id_utilisateur', date_reservation='$date_reservation' WHERE id_reservation=$id_reservation";
  if ($bdd->query($sql) === TRUE) {
    return "Réservation modifiée avec succès";
  } else {
    return "Erreur lors de la modification de la réservation " . $bdd->error;
  }
}

function delete_reservation($id_reservation, $bdd)
{
  $sql = "DELETE FROM reservations WHERE id_reservation='$id_reservation'";
  if ($bdd->query($sql) === TRUE) {
    return "Réservation supprimée avec succès";
  } else {
    return "Erreur lors de la suppression de la réservation : " . $bdd->error;
  }
}