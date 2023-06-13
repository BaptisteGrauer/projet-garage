<?php 
// exclut tous les comptes qui n'ont pas les droit d'administrateur sur le site (champ admin différent de 1), cela s'applique sur toutes les panneaux d'administration.
if (isset($_COOKIE['admin'])){
    if ($_COOKIE['admin'] != 1) {
        header('Location: compte.php');
    }
}
else {
    header('Location: ../index.php');
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
            <h2>Panneau d'administration</h2>
            <a href="advanced/advanced-admin.php">Accéder au panneau d'administration avancé</a>
            <h3>Utilisateurs</h3>
            <div class="section-admin">
                <a href="advanced/user/read-all-users.php"><img src="../../include/icons/visibility.png"><img src="../../include/icons/group.png"><h4>Voir tous les utilisateurs</h4></a>
            </div>
            <h3>Voitures</h3>
            <div class="section-admin">
                <a href="advanced/voitures/add-voiture.php"><img src="../../include/icons/add.png"><img src="../../include/icons/car.png"><h4>Ajouter une voiture</h4></a>
            </div>
            <h3>Réservations</h3>
            <div class="section-admin">
                <a href="advanced/reservations/read-reservation.php"><img src="../../include/icons/visibility.png"><img src="../../include/icons/cart.png"><h4>Voir toutes les réservations</h4></a>
            </div>
        </section>
        <?php include '../include/footer.php'?>
    </body>
</html>