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
            <h2>Afficher tous les utilisateurs</h2>    
            <table>
                <thead>
                    <tr>
                        <th>id_utilisateur</th>
                        <th>email</th>
                        <th>nom</th>
                        <th>mdp</th>
                        <th>admin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../../../../code/crud_users.php";
                        read_all_user_text($bdd);
                    ?>
                </tbody>
            </table>
            <?php include "all-user.php"?>
        </section>
        <?php include '../../../../include/footer.php'?>
    </body>
</html>