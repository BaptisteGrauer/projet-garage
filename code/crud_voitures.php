<?php
// informations d'identification de la base de données
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "garage";

// création de la connexion à la base de données
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

function read_all_voiture($conn)
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
  } else {
    echo "Aucun enregistrement trouvé";
  }
}

function read_all_voiture_text($conn)
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
  } else {
    echo "Aucun enregistrement trouvé";
  }
}

function update_voiture($id, $nom, $email, $telephone, $conn)
{
  $sql = "UPDATE voitures SET nom='$nom', email='$email', telephone='$telephone' WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    return "Enregistrement mis à jour avec succès";
  } else {
    return "Erreur lors de la mise à jour de l'enregistrement: " . $conn->error;
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