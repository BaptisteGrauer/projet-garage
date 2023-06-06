<?php
include "variables.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function create_reservation($id_voiture, $id_utilisateur, $date_reservation, $conn)
{
  $sql = "INSERT INTO reservations (id_voiture, id_utilisateur, date_reservation) VALUES ('$id_voiture', '$id_utilisateur', '$date_reservation')";

  if ($conn->query($sql) === TRUE) {
    return "Réservation créée avec succès";
  } else {
    return "Erreur lors de la réservation : " . $conn->error;
  }
}

function read_all_reservation($conn)
{
  $sql = "SELECT * FROM reservations";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // parcourir les résultats de la requête
    while ($row = $result->fetch_assoc()) {
      // Récupération marque et modèle de la voiture
      $id_voiture = $row['id_voiture'];
      $sql_v = "SELECT marque,modele FROM voitures WHERE id_voiture='$id_voiture'";
      $result_v = $conn->query($sql_v);
      $row_v = $result_v->fetch_assoc();
      // Récupération nom utilisateur
      $id_utilisateur = $row['id_utilisateur'];
      $sql_u = "SELECT nom FROM utilisateurs WHERE id_utilisateur='$id_utilisateur'";
      $result_u = $conn->query($sql_u);
      $row_u = $result_u->fetch_assoc();
      echo "<tr><td>" . $row["id_reservation"] . "</td><td>" . $row_u['nom'] . "</td><td>" . $row_v['marque']. " " . $row_v['modele'] . "</td><td>". $row["date_reservation"] . "</td></tr>";
    }
  } else {
    echo "Aucune réservation trouvée";
  }
}

function read_all_reservation_user($id_utilisateur, $conn)
{
  $sql = "SELECT * FROM reservations WHERE id_utilisateur='$id_utilisateur'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // parcourir les résultats de la requête
    while ($row = $result->fetch_assoc()) {
      // Récupération marque et modèle de la voiture
      $id_voiture = $row['id_voiture'];
      $sql_v = "SELECT marque,modele FROM voitures WHERE id_voiture='$id_voiture'";
      $result_v = $conn->query($sql_v);
      $row_v = $result_v->fetch_assoc();
      echo "Réservation N°". $row["id_reservation"] ." : <ul><li>Véhicule : ". $row_v['marque']. " " . $row_v['modele'] . "</li><li>Date : ". $row["date_reservation"] . "</li></ul>";
    }
  } else {
    echo "Aucune réservation trouvée";
  }
}

function update_reservation($id_reservation, $id_voiture, $id_utilisateur, $date_reservation, $conn)
{
  $sql = "UPDATE utilisateurs SET id_voiture='$id_voiture', id_utilisateur='$id_utilisateur', date_reservation='$date_reservation' WHERE id_reservation=$id_reservation";

  if ($conn->query($sql) === TRUE) {
    return "Réservation modifiée avec succès";
  } else {
    return "Erreur lors de la modification de la réservation " . $conn->error;
  }
}

function delete_reservation($id_reservation, $conn)
{
  $sql = "DELETE FROM reservations WHERE id_reservation='$id_reservation'";
  if ($conn->query($sql) === TRUE) {
    return "Réservation supprimée avec succès";
  } else {
    return "Erreur lors de la suppression de la réservation : " . $conn->error;
  }
}