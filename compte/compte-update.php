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
            <h2>Modifier les informations d'un utilisateur</h2>
            <a href="compte.php"><img src="/include/icons/arrow_back.png">Retour</a>
            <?php 
            include "../code/crud_users.php";
            $id = $_COOKIE['id'];
            $sql = "SELECT nom FROM utilisateurs WHERE id_utilisateur='$id'";
            $row = $bdd->query($sql)->fetch_assoc();
            $nom = $row['nom']
            ?>
            <form method="POST" action="compte-update.php" class="formulaire">
                <!-- Ajouter les champs de mot de passe pour la modification des informations en dehors du panneau d'administration -->
                <input type="hidden" name="id" value="<?php echo $_COOKIE['id'] ?>" required>
                <p>Modifier le nom d'utilisateur :</p>
                <input type="text" name="nom" placeholder="Nouveau nom d'utilisateur" value="<?php echo $nom?>" required>
                <p>Ancien mot de passe :</p>
                <input type="password" name="amdp" placeholder="Ancien mot de passe">
                <p>Nouveau mot de passe :</p>
                <input type="password" name="nmdp" placeholder="Nouveau mot de passe">
                <p>Confirmer le nouveau mot de passe : </p>
                <input type="password" name="cmdp" placeholder="Confirmer mot de passe">
                <input type="submit" value="Appliquer les modifications">
            </form>
            <p class="message-php">
            <?php 
                if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST['nom']) AND isset($_POST['amdp']) AND isset($_POST['nmdp']) AND isset($_POST['cmdp'])){
                    $nom = $_POST["nom"];
                    $id = $_POST['id'];
                    $sql = "SELECT mdp FROM utilisateurs WHERE id_utilisateur='$id'";
                    if($bdd->query($sql)->num_rows > 0) {
                        $row = $bdd->query($sql)->fetch_assoc();
                        $amdp = hash('sha256',$_POST["amdp"]);
                        $mdp = $row['mdp'];
                        if ($mdp != $amdp) {
                            echo "Le mot de passe est incorrect";
                        }
                        else {
                            if ($id == 1 and $nom !="admin") {
                                echo "Vous ne pouvez pas modifier le nom de l'administrateur";
                                $nom = "admin";
                            }
                            $nmdp = hash('sha256',$_POST["nmdp"]);
                            $cmdp = hash('sha256',$_POST["cmdp"]);
                            if ($nmdp != $cmdp) {
                                echo "Les mots de passe ne correspondent pas";
                            }
                            else {
                                if ($nmdp == "" AND $cmdp == "") { // Si pas de changement de mot de passe
                                    echo update_user($id, $nom, $mdp, $bdd);
                                }
                                else {
                                    echo update_user($id, $nom, $nmdp, $bdd);
                                }
                            }
                        }
                    }
                }
            ?>
            </p>
        </section>
        <?php include '../include/footer.php'?>
    </body>
</html>