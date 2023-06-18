<?php 
if (isset($_COOKIE['admin'])){
    if ($_COOKIE['admin'] != 1) {
        header('Location: ../../compte/compte.php');
    }
}
else {
    header('Location: ../../../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../../../include/head.php'?>
    </head>
    <body>
        <?php include '../../../include/header.php'?>
        <section class="contenu">
            <h2>Modifier les informations d'un utilisateur</h2>
            <a href="../advanced-admin.php"><img src="/include/icons/arrow_back.png">Retour</a>
            <form method="POST" action="update-user.php" class="formulaire">
                <p>ID de l'utilisateur à modifier</p>
                <input type="text" name="id" placeholder="ID d'utilisateur">
                <input type="submit" value="Envoyer">
            </form>
            <?php 
            include "../../../code/crud_users.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['id'])) {
                $id = $_POST['id'];
                $sql = "SELECT nom FROM utilisateurs WHERE id_utilisateur='$id'";
                if ($bdd->query($sql)->num_rows > 0) {
                    $row = $bdd->query($sql)->fetch_assoc();
                    $nom = $row['nom'];
                }
                else {
                    echo "L'utilisateur n'existe pas";
                    $nom = "";
                }
            }
            else {
                $nom = "";
            }
            ?>
            <form method="POST" action="update-user.php" class="formulaire">
                <?php
                if(isset($_POST['id'])) {
                    $id = $_POST['id'];
                    }
                else {
                    $id = "";
                }
                ?>
                <!-- Ajouter les champs de mot de passe pour la modification des informations en dehors du panneau d'administration -->
                <input type="hidden" name="id" value="<?php echo $id ?>" required>
                <p>Modifier le nom d'utilisateur :</p>
                <input type="text" name="nom" placeholder="Nouveau nom d'utilisateur" value="<?php echo $nom?>" required>
                <!--<p>Ancien mot de passe :</p>
                <input type="password" name="amdp" placeholder="Ancien mot de passe">-->
                <p>Nouveau mot de passe :</p>
                <input type="password" name="nmdp" placeholder="Nouveau mot de passe">
                <!--<p>Confirmer le nouveau mot de passe : </p>
                <input type="password" name="cmdp" placeholder="Confirmer mot de passe">-->
                <input type="submit" value="Appliquer les modifications">
            </form>
            <p class="message-php">
            <?php 
                if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['nom']) /*AND isset($_POST['amdp'])*/ AND isset($_POST['nmdp']) /*AND isset($_POST['cmdp'])*/){
                    $nom = $_POST["nom"];
                    $id = $_POST['id'];
                    $sql = "SELECT mdp FROM utilisateurs WHERE id_utilisateur='$id'";
                    if($bdd->query($sql)->num_rows > 0) {
                        $row = $bdd->query($sql)->fetch_assoc();
                        if (false) {
                        }
                        else {
                            if ($id == 1) {
                                echo "Vous ne pouvez pas modifier le nom de l'administrateur";
                                $nom = "admin";
                            }
                            $nmdp = hash('sha256',$_POST["nmdp"]);
                            if (false){}
                            else {
                                echo update_user($id, $nom, $nmdp, $bdd);
                            }
                        }
                    }
                }
            ?>
            </p>
            <?php include "all-user.php"?>
            </section>
        <?php include '../../../include/footer.php'?>
    </body>
</html>