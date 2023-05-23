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
            <h2>Ajouter</h2>
            <form method="POST" action="add-user.php" class="formulaire">
                <p>Créer un nouvel utilisateur</p>
                <input type="text" name="cemail" placeholder="E-mail utilisateur">
                <input type="text" name="cnom" placeholder="Nom d'utilisateur">
                <input type="password" name="cmdp" placeholder="MDP utilisateur">
                <input type="submit" value="Créer l'utilisateur">
                <p class="message-php" id="cuser">
                    <?php
                        include '../../../../code/crud_users.php';
                        if ($_SERVER["REQUEST_METHOD"] == "POST" AND $_POST["cemail"] != "" AND $_POST["cnom"] != "" AND $_POST["cmdp"] != "") {
                            $cemail = $_POST["cemail"];
                            $cnom = $_POST["cnom"];
                            $cmdp = $_POST["cmdp"];
                            $cmdp_hash = hash('sha256',$cmdp);
                            if ($cemail == "" OR $cnom == "" OR $cmdp == ""){
                                echo "Un des champs est vide, veuillez entrer des valeurs valides";
                            }
                            else {
                                echo create_user($cemail, $cnom, $cmdp_hash, $conn);
                            }
                        }
                    ?>
                </p>
            </form>
            <?php include "all-user.php"?>
        </section>
        <?php include '../../../../include/footer.php'?>
    </body>
</html>