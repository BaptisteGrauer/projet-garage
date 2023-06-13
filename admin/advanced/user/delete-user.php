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
            <h2>Supprimer</h2>
            <a href="../advanced-admin.php"><img src="/include/icons/arrow_back.png">Retour</a>
            <form method="POST" action="delete-user.php" class="formulaire">
                <p>Supprimer un utilisateur</p>
                <input type="text" name="dnom" placeholder="Nom d'utilisateur" required>
                <input type="submit" value="Supprimer le compte">
            </form>
            <p class="message-php" id="duser">
                <?php
                    include "../../../code/crud_users.php";
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $dnom = $_POST["dnom"];
                        $sql = "SELECT nom FROM utilisateurs WHERE nom='$dnom'";
                        $result = $bdd->query($sql);
                        $row = $result->fetch_assoc();
                        if ($result->num_rows > 0) {
                            $dnom = $row["nom"];
                            if ($dnom == "admin"){
                                echo "Vous ne pouvez pas supprimer le compte administrateur";
                            }
                            else {
                                echo delete_user($dnom,$bdd);
                            }
                        }
                        else {
                            echo "L'utilisateur $dnom n'existe pas";
                        }
                    }
                ?>
            </p>
            <?php include "all-user.php"?>
            </section>
        <?php include '../../../include/footer.php'?>
    </body>
</html>
