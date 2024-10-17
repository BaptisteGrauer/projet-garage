<?php
// exclut tous les comptes qui n'ont pas les droit d'administrateur sur le site (champ admin différent de 1), cela s'applique sur toutes les panneaux d'administration.

session_start();

if (isset($_SESSION['utilisateur'][2])){
    if ($_SESSION['utilisateur'][2] != 1) {
        header('Location: compte.php');
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
            <h2>Afficher tous les utilisateurs</h2>    
            <a href="../advanced-admin.php"><img src="/include/icons/arrow_back.png">Retour</a>
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
                    <?php
                    include "../../../code/crud_users.php";
                        read_all_user_text($bdd);
                    ?>
                </tbody>
            </table>
            <?php include "all-user.php"?>
            </section>
        <?php include '../../../include/footer.php'?>
    </body>
</html>