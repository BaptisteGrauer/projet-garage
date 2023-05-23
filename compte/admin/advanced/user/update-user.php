<?php 
if (isset($_COOKIE['admin'])){
    if ($_COOKIE['admin'] != 1) {
        header('Location: ../../../compte.php');
    }
}
else {
    header('Location: ../../../../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../../../../include/head.php'?>
    </head>
    <body>
        <?php include '../../../../include/header.php'?>
        <section class="contenu">
            <h2>Modifier les informations d'un utilisateur</h2>
            <p>Laisser les cases vides pour garder les valeurs d'origine</p>
            <form method="POST" action="update-user.php" class="formulaire">
                <input type="text" name="uid" placeholder="ID d'utilisateur existant">
                <input type="text" name="uemail" placeholder="Nouvelle adresse e-mail">
                <input type="text" name="unom" placeholder="Nouveau nom d'utilisateur">
                <input type="password" name="umdp" placeholder="Nouveau mot de passe">
                <input type="submit" value="Appliquer les modifications">
            </form>
            <p class="message-php">
            <?php 
            include "../../../../code/crud_users.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $id = $_POST["uid"];
                $email = $_POST["uemail"];
                $nom = $_POST["unom"];
                $mdp = hash('sha256',$_POST["umdp"]);
                $pdp = "";
                if ($id == ""){
                    echo "Veuillez entrer un ID d'utilisateur";
                }
                else {
                    if ($email == "") {
                        $sql = "SELECT email FROM utilisateurs WHERE id_utilisateur='$id'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $email = $row["email"];
                    }
                    if ($nom == "") {
                        $sql = "SELECT nom FROM utilisateurs WHERE id_utilisateur='$id'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $nom = $row["nom"];
                    }
                    if ($id == 1) {
                        echo "Vous ne pouvez pas modifier le nom de l'administrateur";
                        $nom = "admin";
                    }
                    if ($mdp == "") {
                        $sql = "SELECT mdp FROM utilisateurs WHERE id_utilisateur='$id'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $mdp = $row["mdp"];
                    }
                    if ($pdp == "") {
                        $sql = "SELECT pdp FROM utilisateurs WHERE id_utilisateur='$id'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $pdp = $row["pdp"];
                    }
                    echo update_user($id,$nom,$email,$mdp,$pdp,$conn);
                }
            }
            ?>
            </p>
            <?php include "all-user.php"?>
        </section>
        <?php include '../../../../include/footer.php'?>
    </body>
</html>