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
            <h2>Afficher les réservations</h2>
            <a href="../advanced-admin.php"><img src="/include/icons/arrow_back.png">Retour</a>
            <table>
                <thead>
                    <tr>
                        <th>N° Réservation</th>
                        <th>Nom du client</th>
                        <th>Voiture</th>
                        <th>Date de la réservation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            include "../../../code/crud_reservations.php";
                            read_all_reservation($bdd);
                        ?>
                    </tr>
                </tbody>
            </table>
            <?php include 'all-reservation.php'?>
        </section>
        <?php include '../../../include/footer.php'?>
    </body>
</html>
