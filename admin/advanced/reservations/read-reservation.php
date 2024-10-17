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
