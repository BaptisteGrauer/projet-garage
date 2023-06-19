<?php
include "configuration.php";

function create_voiture($immatriculation, $marque, $modele, $categorie, $date_mise_en_circulation, $prix, $date_entree_garage, $puissance, $type_carburant, $description, $photo, $bdd)
// Ajoute une voiture dans la BDD (-> panneau admin)
{
  $sql = "INSERT INTO voitures (immatriculation, marque, modele, categorie, date_mise_en_circulation, prix, date_entree_garage, puissance, type_carburant, description, photo, etat_reservation)
  VALUES ('$immatriculation', '$marque', '$modele', '$categorie', '$date_mise_en_circulation', '$prix', '$date_entree_garage', '$puissance', '$type_carburant', '$description', '$photo', '0')";
  if ($bdd->query($sql) === TRUE) {
    return "La voiture $marque $modele a été ajoutée avec succès";
  } else {
    return "Erreur lors de l'ajout de la voiture : " . $bdd->error;
  }
}

function read_voiture_id_complete($id, $bdd) // Affiche les détails d'une voiture (-> page détails voiture)
{
  $sql = "SELECT * FROM voitures WHERE id_voiture='$id'";
  $result = $bdd->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo
    "<h2>".$row['marque']." ". $row['modele']. "</h2>
    <div class='details-voiture'>
      <img src='" . $row['photo'] . "'>
      <ul>
        <li>Immatriculation : " . $row["immatriculation"] . "</li>
        <li>Marque : " . $row["marque"] . "</li>
        <li>Modèle : " . $row['modele'] . "</li>
        <li>Catégorie : " . $row['categorie'] . "</li>
        <li>Date de mise en circulation : " . $row['date_mise_en_circulation'] . "</li>
        <li>Prix : " . $row['prix'] . "CFP</li>
        <li>Date d'entrée au garage : " . $row['date_entree_garage'] . "</li>
        <li>Puissance : " . $row['puissance'] . " chevaux</li>
        <li>Motorisation : " . $row['type_carburant'] . "</li>
        <li>Description : " . $row['description'] . "</li>
      </ul>
    </div>";
  }
}

function read_voiture_id($id, $bdd) // Affiche une voiture (-> page réservations)
{
  $sql = "SELECT * FROM voitures WHERE id_voiture='$id'";
  $result = $bdd->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $link = "../details-vehicule.php?id=" . $row['id_voiture'] . "";
      echo
        "<div class='voiture'><ul>" .
        "<li><h3>" . $row["marque"] . " " . $row['modele'] . "</h3></li>" .
        "<li>Prix : " . $row['prix'] . " CFP</li>" .
        "<li>Puissance : " . $row['puissance'] . " Ch</li>" .
        "<li>Motorisation : " . $row['type_carburant'] . "</li>" .
        "<li><a href=$link>Voir plus<img src='/include/icons/expand-more.png'></a></li></ul>" .
        "<img src='" . $row['photo'] . "'></div>";
    }
  } else {
    echo "Aucune voiture trouvée";
  }
}

function read_all_voiture($bdd) // Affiche toutes les voitures disponibles à la réservation (-> page voitures)
{
  $sql = "SELECT * FROM voitures WHERE etat_reservation=0 ORDER BY RAND()";
  $result = $bdd->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $link = "../details-vehicule.php?id=" . $row['id_voiture'] . "";
      echo
        "<div class='voiture'><ul>" .
        "<li><h3>" . $row["marque"] . " " . $row['modele'] . "</h3></li>" .
        "<li>Prix : " . $row['prix'] . " CFP</li>" .
        "<li>Puissance : " . $row['puissance'] . " Ch</li>" .
        "<li>Motorisation : " . $row['type_carburant'] . "</li>" .
        "<li><a href=$link>Voir plus<img src='/include/icons/expand-more.png'></a></li></ul>" .
        "<img src='" . $row['photo'] . "'></div>";
    }
  } else {
    echo "Aucune voiture trouvée";
  }
}

function read_all_voiture_complete($bdd) // Affiche toutes les voitures et toutes leur données (-> panneau admin)
{
  $sql = "SELECT * FROM voitures";
  $result = $bdd->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $link = "../details-vehicule.php?id=" . $row['id_voiture'] . "";
      echo
        "<tr>
          <td>". $row['id_voiture'] . "</td>
          <td>" . $row['immatriculation'] . "</td>
          <td>" . $row["marque"] . "</td>
          <td>" . $row['modele'] . "</td>
          <td>" . $row['categorie'] . "</td>
          <td>" . $row['date_mise_en_circulation'] . "</td>
          <td>" . $row['prix'] . "</td>
          <td>" . $row['date_entree_garage'] . "</td>
          <td>" . $row['puissance'] . "</td>
          <td>" . $row['type_carburant'] . "</td>
          <td>" . $row['description'] . "</td>
          <td>" . $row['etat_reservation'] . "</td>
          <td>" . "<img src='" . $row['photo'] ."' class='affichage-admin'></td>
        </tr>";
    }
  } else {
    echo "Aucune voiture trouvée";
  }
}

function read_6_voiture_random($bdd) // Affiche 6 voitures choisies aléatoirement (-> page d'accueil)
{
  $sql = "SELECT * FROM voitures WHERE etat_reservation=0 ORDER BY RAND() LIMIT 6";
  $result = $bdd->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $link = "../details-vehicule.php?id=" . $row['id_voiture'] . "";
      echo
        "<div class='voiture'><ul>" .
        "<li><h3>" . $row["marque"] . " " . $row['modele'] . "</h3></li>" .
        "<li>Prix : " . $row['prix'] . " CFP</li>" .
        "<li>Puissance : " . $row['puissance'] . " Ch</li>" .
        "<li>Motorisation : " . $row['type_carburant'] . "</li>" .
        "<li><a href=$link>Voir plus<img src='/include/icons/expand-more.png'></a></li></ul>" .
        "<img src='" . $row['photo'] . "'></div>";
    }
  } else {
    echo "Aucune voiture trouvée";
  }
}

function read_all_voiture_text_categorie($categorie, $bdd) // Affiche toutes les voitures appartenant à une catégorie précise (-> page catégorie)
{
  $sql = "SELECT * FROM voitures WHERE etat_reservation=0 AND categorie='$categorie'";
  $result = $bdd->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $link = "../details-vehicule.php?id=" . $row['id_voiture'] . "";
      echo
        "<div class='voiture'><ul>" .
        "<li><h3>" . $row["marque"] . " " . $row['modele'] . "</h3></li>" .
        "<li>Prix : " . $row['prix'] . " CFP</li>" .
        "<li>Puissance : " . $row['puissance'] . " Ch</li>" .
        "<li>Motorisation : " . $row['type_carburant'] . "</li>" .
        "<li><a href=$link>Voir plus<img src='/include/icons/expand-more.png'></a></li></ul>" .
        "<img src='" . $row['photo'] . "'></div>";
    }
  } else {
    echo "Aucune voiture trouvée";
  }
}

function read_3_voiture_last($bdd) // Affiche les trois dernières voitures ajoutées à la BDD (-> page d'accueil)
{
  $sql = "SELECT * FROM voitures WHERE etat_reservation=0 ORDER BY id_voiture DESC LIMIT 3";
  $result = $bdd->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $link = "details-vehicule.php?id=" . $row['id_voiture'] . "";
      echo
        "<div class='voiture'><ul>" .
        "<li><h3>" . $row["marque"] . " " . $row['modele'] . "</h3></li>" .
        "<li>Prix : " . $row['prix'] . " CFP</li>" .
        "<li>Puissance : " . $row['puissance'] . " Ch</li>" .
        "<li>Motorisation : " . $row['type_carburant'] . "</li>" .
        "<li><a href=$link>Voir plus<img src='/include/icons/expand-more.png'></a></li></ul>" .
        "<img src='" . $row['photo'] . "'></div>";
    }
  } else {
    echo "Aucune voiture trouvée";
  }
}

function update_voiture($id_voiture, $immatriculation, $marque, $modele, $categorie, $date_mise_en_circulation, $prix, $date_entree_garage, $puissance, $description, $photo, $bdd) 
// Met à jour les informations d'une voiture (-> panneau admin)
{
  $sql = "UPDATE voitures SET 
  immatriculation='$immatriculation', 
  marque='$marque', 
  modele='$modele', 
  categorie='$categorie',
  date_mise_en_circulation='$date_mise_en_circulation', 
  prix=$prix, 
  date_entree_garage='$date_entree_garage', 
  puissance=$puissance, 
  description='$description',
  photo='$photo' 
  WHERE id_voiture='$id_voiture'";
  if ($bdd->query($sql) === TRUE) {
    return "Information de la voiture mises à jour avec succès";
  } else {
    return "Erreur lors de la mise à jour de la voiture: " . $bdd->error;
  }
}

function update_voiture_reservation($id_voiture, $etat_reservation, $bdd) // Met à jour l'état de réservation d'une voiture (-> page réservation)
{
  $sql = "UPDATE voitures SET etat_reservation='$etat_reservation'
  WHERE id_voiture='$id_voiture'";

  if ($bdd->query($sql) === TRUE) {
    return "Information de la voiture mises à jour avec succès ";
  } else {
    return "Erreur lors de la mise à jour de la voiture: " . $bdd->error;
  }
}

function delete_voiture($id_voiture, $bdd) // Supprime une voiture de la base de donnée (-> panneau admin)
{
  $sql = "DELETE FROM voitures WHERE id_voiture='$id_voiture'";

  if ($bdd->query($sql) === TRUE) {
    return "Voiture supprimée avec succès";
  } else {
    return "Erreur lors de la suppression de la voiture: " . $bdd->error;
  }
}
