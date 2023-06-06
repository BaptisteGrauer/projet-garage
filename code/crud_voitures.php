<?php
include "variables.php";

function create_voiture($immatriculation, $marque, $modele, $categorie, $date_mise_en_circulation, $prix, $date_entree_garage, $puissance, $type_carburant, $description, $photo, $conn)
{
  $sql = "INSERT INTO voitures (immatriculation, marque, modele, categorie, date_mise_en_circulation, prix, date_entree_garage, puissance, type_carburant, description, photo, etat_reserve)
  VALUES ('$immatriculation', '$marque', '$modele', '$categorie', '$date_mise_en_circulation', '$prix', '$date_entree_garage', '$puissance', '$type_carburant', '$description', '$photo', '0')";

  if ($conn->query($sql) === TRUE) {
    return "La voiture $marque $modele a été ajoutée avec succès";
  } else {
    return "Erreur lors de l'ajout de la voiture : " . $conn->error;
  }
}

function read_voiture_id($id, $conn)
{
  $sql = "SELECT * FROM voitures WHERE id_voiture='$id'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo
    "<img src='" . $row['photo'] . "'>
    <ul>
      <li>Immatriculation : " . $row["immatriculation"] . "</li>
      <li>Marque : " . $row["marque"] . "</li>
      <li>Modèle : " . $row['modele'] . "</li>
      <li>Catégorie : " . $row['categorie'] . "</li>
      <li>Date de mise en circulation : " . $row['date_mise_en_circulation'] . "</li>
      <li>Prix : " . $row['prix'] . "CFP</li>
      <li>Date d'entrée au garage : " . $row['date_entree_garage'] . "</li>
      <li>Puissance : " . $row['puissance'] . " chevaux</li>
      <li>Type de carburant : " . $row['type_carburant'] . "</li>
      <li>Description : " . $row['description'] . "</li>
    </ul>";
  }
}

function read_all_voiture($conn) // affiche toutes les voitures disponibles à la réservation dans la bdd
{
  $sql = "SELECT * FROM voitures WHERE etat_reservation=0 ORDER BY RAND()";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $link = "../details-vehicule.php?id=" . $row['id_voiture'] . "";
      echo
        "<div class='voiture'><ul>" .
        "<li><h3>" . $row["marque"] . " " . $row['modele'] . "</h3></li>" .
        "<li>Prix : " . $row['prix'] . " CFP</li>" .
        "<li>Puissance : " . $row['puissance'] . " Ch</li>" .
        "<li>Carburant : " . $row['type_carburant'] . "</li>" .
        "<li><a href=$link>Voir plus<img src='/include/icons/expand-more.png'></a></li></ul>" .
        "<img src='" . $row['photo'] . "'></div>";
    }
  } else {
    echo "Aucune voiture trouvée";
  }
}

function read_6_voiture_random($conn) // affiche 6 voitures choisies aléatoirement dans la bdd avec mise en forme HTML
{
  $sql = "SELECT * FROM voitures WHERE etat_reservation=0 ORDER BY RAND() LIMIT 6";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $link = "../details-vehicule.php?id=" . $row['id_voiture'] . "";
      echo
        "<div class='voiture'><ul>" .
        "<li><h3>" . $row["marque"] . " " . $row['modele'] . "</h3></li>" .
        "<li>Prix : " . $row['prix'] . "CFP</li>" .
        "<li>Puissance : " . $row['puissance'] . " Ch</li>" .
        "<li>Carburant : " . $row['type_carburant'] . "</li>" .
        "<li><a href=$link>Voir plus<img src='/include/icons/expand-more.png'></a></li></ul>" .
        "<img src='" . $row['photo'] . "'></div>";
    }
  } else {
    echo "Aucune voiture trouvée";
  }
}

function read_all_voiture_text_categorie($categorie, $conn) // affiche les trois dernières voitures ajoutées à la bdd avec mise en forme HTML
{
  $sql = "SELECT * FROM voitures WHERE etat_reservation=0 AND categorie='$categorie'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $link = "../details-vehicule.php?id=" . $row['id_voiture'] . "";
      echo
        "<div class='voiture'><ul>" .
        "<li><h3>" . $row["marque"] . " " . $row['modele'] . "</h3></li>" .
        "<li>Prix : " . $row['prix'] . "CFP</li>" .
        "<li>Puissance : " . $row['puissance'] . " Ch</li>" .
        "<li>Carburant : " . $row['type_carburant'] . "</li>" .
        "<li><a href=$link>Voir plus<img src='/include/icons/expand-more.png'></a></li></ul>" .
        "<img src='" . $row['photo'] . "'></div>";
    }
  } else {
    echo "Aucune voiture trouvée";
  }
}

function read_3_voiture_text_last($conn) // affiche les trois dernières voitures ajoutées à la bdd avec mise en forme HTML
{
  $sql = "SELECT * FROM voitures WHERE etat_reservation=0 ORDER BY id_voiture DESC LIMIT 3";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $link = "details-vehicule.php?id=" . $row['id_voiture'] . "";
      echo
        "<div class='voiture'><ul>" .
        "<li><h3>" . $row["marque"] . " " . $row['modele'] . "</h3></li>" .
        "<li>Prix : " . $row['prix'] . "CFP</li>" .
        "<li>Puissance : " . $row['puissance'] . " Ch</li>" .
        "<li>Carburant : " . $row['type_carburant'] . "</li>" .
        "<li><a href=$link>Voir plus<img src='/include/icons/expand-more.png'></a></li></ul>" .
        "<img src='" . $row['photo'] . "'></div>";
    }
  } else {
    echo "Aucune voiture trouvée";
  }
}

function update_voiture($id_voiture, $immatriculation, $marque, $modele, $categorie, $date_mise_en_circulation, $prix, $date_entree_garage, $puissance, $description, $photo, $conn)
{
  $sql = "UPDATE voitures SET
  immatriculation='$immatriculation',
  marque='$marque',
  modele='$modele',
  categorie='$categorie',
  date_mise_en_circulation='$date_mise_en_circulation',
  prix='$prix', 
  date_entree_garage'$date_entree_garage',
  puissance='$puissance',
  description='$description',
  photo='$photo'
  WHERE id_voiture=$id_voiture";

  if ($conn->query($sql) === TRUE) {
    return "Information de la voiture mises à jour avec succès";
  } else {
    return "Erreur lors de la mise à jour de la voiture: " . $conn->error;
  }
}

function update_voiture_reservation($id_voiture, $etat_reservation, $conn)
{
  $sql = "UPDATE voitures SET etat_reservation='$etat_reservation'
  WHERE id_voiture='$id_voiture'";

  if ($conn->query($sql) === TRUE) {
    return "Information de la voiture mises à jour avec succès";
  } else {
    return "Erreur lors de la mise à jour de la voiture: " . $conn->error;
  }
}

function delete_voiture($id_voiture, $conn)
{
  $sql = "DELETE FROM voitures WHERE id_voiture='$id_voiture'";

  if ($conn->query($sql) === TRUE) {
    return "Voiture supprimée avec succès";
  } else {
    return "Erreur lors de la suppression de la voiture: " . $conn->error;
  }
}

//print_r($_POST);