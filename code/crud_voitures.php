<?php
// informations d'identification de la base de données
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "garage";

// connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// vérification de la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function create_voiture($immatriculation, $marque, $modele, $categorie, $date_mise_en_circulation, $prix, $date_entree_garage, $puissance, $description, $photo, $conn)
{
  $sql = "INSERT INTO voitures (immatriculation, marque, modele, categorie, date_mise_en_circulation, prix, date_entree_garage, puissance, description, photo, etat_reserve)
  VALUES ('$immatriculation', '$marque', '$modele', '$categorie', '$date_mise_en_circulation', '$prix', '$date_entree_garage', '$puissance', '$description', '$photo', '0')";

  if ($conn->query($sql) === TRUE) {
    return "La voiture $marque $modele a été ajoutée avec succès";
  } else {
    return "Erreur lors de l'ajout de la voiture : " . $conn->error;
  }
}

function read_all_voiture($conn) // affiche toutes les voitures dans la bdd
{
  $sql = "SELECT * FROM voitures";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo 
      $row["marque"] .
      $row['modele'] .
      $row['categorie'] .
      $row['prix'] .
      $row['date_entree_garage'] . 
      $row['puissance'] . " " .
      $row['type_carburant'] .
      $row['description'] .
      $row['photo'];
    }
  } else {
    echo "Aucune voiture trouvée";
  }
}

function read_all_voiture_complete($conn) // affiche toutes les voitures dans la bdd avec leurs information complètes
{
  $sql = "SELECT * FROM voitures";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo 
      $row["id_voiture"] .
      $row["immatriculation"] . 
      $row["marque"] . 
      $row['modele'] . 
      $row['categorie'] . 
      $row['date_mise_en_circulation'] . 
      $row['prix'] . 
      $row['date_entree_garage'] . 
      $row['puissance'] . 
      $row['type_carburant'] . 
      $row['description'] . 
      $row['photo'];
    }
  }
  else {
    echo "Aucune voiture trouvée";
  }
}

function read_all_voiture_text($conn) // affiche toutes les voitures dans la bdd avec mise en forme HTML
{
  $sql = "SELECT * FROM voitures";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo 

      $row["id_voiture"] . " " .
      $row["immatriculation"] . " " .
      $row["marque"] . " " .
      $row['modele'] . " " .
      $row['categorie'] . " " .
      $row['date_mise_en_circulation'] . " " .
      $row['prix'] . " " .
      $row['date_entree_garage'] . " " .
      $row['puissance'] . " " .
      $row['type_carburant'] . " " .
      $row['description'] . " " .
      $row['photo'];
    }
  } else {
    echo "Aucune voiture trouvée";
  }
}

function read_all_voiture_text_last($conn) // affiche les trois dernières voitures ajoutées à la bdd avec mise en forme HTML
{
  $sql = "SELECT * FROM voitures ORDER BY id_voiture DESC LIMIT 3";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo 
      "<div class='voiture'><ul>" .
          "<li><h3>".$row["marque"] . " ". $row['modele'] . "</h3></li>".
          "<li>Prix : ".$row['prix'] . "CFP</li>".
          "<li>Puissance : ".$row['puissance'] . " Ch</li>".
          "<li>Type de carburant : ".$row['type_carburant'] .  "</li>".
          "<li><a href=''>Voir plus</a></li></ul>".
      "<img src='".$row['photo']."'></div>";
    }
  } else {
    echo "Aucune voiture trouvée";
  }
}

function update_voiture($id, $immatriculation, $marque, $modele, $categorie, $date_mise_en_circulation, $prix, $date_entree_garage, $puissance, $description, $photo, $conn)
{
  $sql = "UPDATE voitures SET immatriculation='$immatriculation',
  marque='$marque',
  modele='$modele',
  categorie='$categorie',
  date_mise_en_circulation='$date_mise_en_circulation',
  prix='$prix', 
  date_entree_garage'$date_entree_garage',
  puissance='$puissance',
  description='$description',
  photo='$photo'
  WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    return "Information de la voiture mises à jour avec succès";
  } else {
    return "Erreur lors de la mise à jour de la voiture: " . $conn->error;
  }
}

function delete_voiture($id, $conn)
{
  $sql = "DELETE FROM voitures WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    return "Voiture supprimée avec succès";
  } else {
    return "Erreur lors de la suppression de la voiture: " . $conn->error;
  }
}