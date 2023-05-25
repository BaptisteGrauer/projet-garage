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

function connexion($nom, $mdp, $conn)
{
  $sql = "SELECT mdp FROM utilisateurs WHERE nom='$nom'";
  $result = $conn->query($sql);
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



// fonctions CRUD pour la table utilisateurs
function create_user($email, $nom, $mdp, $conn)
{
  $sql = "INSERT INTO utilisateurs (email, nom, mdp) VALUES ('$email', '$nom', '$mdp')";

  if ($conn->query($sql) === TRUE) {
    return "L'utilisateur $nom a été créé avec succès";
  } else {
    return "Erreur lors de la création de l'utilisateur: " . $conn->error;
  }
}

function read_user_text($nom, $conn)
{
  $sql = "SELECT * FROM utilisateurs WHERE nom='$nom'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if ($result->num_rows != 0) {
    echo "<tr><td>" . $row['id_utilisateur'] . "</td><td>" . $row["email"] . "</td><td>" . $row["nom"] . "</td><td>" . $row["mdp"] . "</td><td>" . $row["admin"] ."</td></tr>";
  } else {
    return "Valeur invalide";
  }
}
function read_user($nom, $conn)
{
  $sql = "SELECT * FROM utilisateurs WHERE nom='$nom'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if ($result->num_rows != 0) {
    echo $row['id_utilisateur'] . $row["email"] . $row["nom"] . $row["mdp"] . $row["admin"] . $row['pdp'];
  } else {
    return "Valeur invalide";
  }
}
function read_all_user_text($conn)
{
  $sql = "SELECT * FROM utilisateurs";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row['id_utilisateur'] . "</td><td>" . $row["email"] . "</td><td>" . $row["nom"] . "</td><td>" . $row["mdp"] . "</td><td>" . $row["admin"] . "</td>";
    }
  } else {
    echo "Aucun utilisateur trouvé";
  }
}
function read_all_user($conn)
{
  $sql = "SELECT * FROM utilisateurs";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo $row['id_utilisateur'] . $row["email"] . $row["nom"] . $row["mdp"] . $row["admin"] ;
    }
  } else {
    echo "Aucun utilisateur trouvé";
  }
}

function update_user($id, $nom, $email, $mdp, $conn)
{
  $sql = "UPDATE utilisateurs SET nom='$nom', email='$email', mdp='$mdp' WHERE id_utilisateur=$id";
  if ($conn->query($sql) === TRUE) {
    return "Enregistrement mis à jour avec succès";
  } else {
    return "Erreur lors de la mise à jour de l'enregistrement: " . $conn->error;
  }
}

function delete_user($nom, $conn)
{
  $sql = "DELETE FROM utilisateurs WHERE nom='$nom'";
    if ($conn->query($sql) === TRUE) {
      return "Utilisateur supprimé avec succès";
    } else {
      return "Erreur lors de la suppression de l'utilisateur : " . $conn->error;
    }
}
