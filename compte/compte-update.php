<?php 
if (!isset($_COOKIE['nom'])) {
    header('Location: /index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../include/head.php'?>
    </head>
    <body>
        <?php include '../include/header.php'?>
        <section class="contenu">
            <h2>Paramètres du compte</h2>
            <h3>Modifier les informations du compte</h3>
            <p>Laisser les cases vides pour garder les valeurs d'origine</p>
            <form method="POST" action="compte-update.php" class="formulaire">
                <input type="text" name="unom" placeholder="Nouveau nom d'utilisateur">
                <input type="password" name="umdp" placeholder="Nouveau mot de passe">
                <input type="submit" value="Appliquer les modifications">
            </form>
            <p class="message-php">
            <?php 
            include "../code/crud_users.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $id = $_COOKIE['id'];
                $nom = $_POST["unom"];
                $mdp = hash('sha256',$_POST["umdp"]);
                if(isset($_FILES['image'])){
                    $file_name = $_FILES['image']["name"];
                    $file_tmp = $_FILES['image']['tmp_name'];
                    move_uploaded_file($file_tmp, "../../images/pdp/" . $file_name);
                    $image_path = "../../images/pdp/" . $file_name;
                    $sql = "INSERT INTO utilisateurs VALUES chemin";
                    $stmt = $bdd->query($sql);
                }
                if ($nom == "") {
                    $sql = "SELECT nom FROM utilisateurs WHERE id_utilisateur='$id'";
                    $result = $bdd->query($sql);
                    $row = $result->fetch_assoc();
                    $nom = $row["nom"];
                }
                if ($id == 1 AND $nom != "admin") {
                    echo "Vous ne pouvez pas modifier le nom de l'administrateur";
                    $nom = "admin";
                }
                if ($mdp == "") {
                    $sql = "SELECT mdp FROM utilisateurs WHERE id_utilisateur='$id'";
                    $result = $bdd->query($sql);
                    $row = $result->fetch_assoc();
                    $mdp = $row["mdp"];
                }
                echo update_user($id,$nom,$mdp,$bdd);
            }
            ?>
        </section>
        <?php include '../include/footer.php'?>
    </body>
</html>