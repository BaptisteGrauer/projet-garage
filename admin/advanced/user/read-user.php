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
            <h2>Afficher les information d'un utilisateur</h2>
            <a href="../advanced-admin.php"><img src="/include/icons/arrow_back.png">Retour</a>
            <form method="POST" action="read-user.php" class="formulaire">
                <p>Entrer un nom d'utilisateur valide :</p>
                <input type="text" name="rnom" placeholder="Nom d'utilisateur" required>
                <input type="submit" value="Afficher les informations du compte">
            </form>
            <table>
                <thead>
                    <tr>
                        <th>id_utilisateur</th>
                        <th>nom</th>
                        <th>mdp</th>
                        <th>admin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                        include "../../../code/crud_users.php";
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $rnom = $_POST["rnom"];
                            if ($rnom == "") {
                                echo "Le champ est vide, veuillez entrer un nom";
                            }
                            else {
                                read_user_text($rnom,$bdd);
                            }
                        }
                    ?>
                    </tr>
                </tbody>
            </table>
            <?php include "all-user.php"?>
        </section>
        <?php include '../../../include/footer.php'?>
    </body>
</html>