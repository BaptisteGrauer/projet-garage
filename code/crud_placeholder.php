<?php
// informations d'identification de la base de données
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "garage";
$conn = new mysqli($servername, $username, $password, $dbname);

// vérification de la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function create_reservation($nom, $email, $telephone, $conn)
{
  $sql = "INSERT INTO utilisateurs (nom, email, telephone) VALUES ('$nom', '$email', '$telephone')";

  if ($conn->query($sql) === TRUE) {
    return "Enregistrement créé avec succès";
  } else {
    return "Erreur lors de la création de l'enregistrement: " . $conn->error;
  }
}

function read_reservation($conn)
{
  $sql = "SELECT * FROM utilisateurs";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // parcourir les résultats de la requête
    while ($row = $result->fetch_assoc()) {
      echo "Nom: " . $row["nom"] . " - Email: " . $row["email"] . " - Téléphone: " . $row["telephone"] . "<br>";
    }
  } else {
    echo "Aucun enregistrement trouvé";
  }
}

//UPDATE : pour mettre à jour des enregistrements dans la base de données
// fonction pour mettre à jour un enregistrement
function update_reservation($id, $nom, $email, $telephone, $conn)
{
  $sql = "UPDATE utilisateurs SET nom='$nom', email='$email', telephone='$telephone' WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    return "Enregistrement mis à jour avec succès";
  } else {
    return "Erreur lors de la mise à jour de l'enregistrement: " . $conn->error;
  }
}

function delete_reservation($id, $conn)
{
  $sql = "DELETE FROM utilisateurs WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    return "Enregistrement supprimé avec succès";
  } else {
    return "Erreur lors de la suppression de l'enregistrement: " . $conn->error;
  }
}