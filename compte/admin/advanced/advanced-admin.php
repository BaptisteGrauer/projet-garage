<?php 
if (isset($_COOKIE['admin'])){
    if ($_COOKIE['admin'] != 1) {
        header('Location: ../../compte.php');
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
            <h2>Panneau d'administration avancé</h2>
            <a href="../admin.php">Retour au panneau d'administration général</a>
            <p class="Avertissement">
                Avertissement : toutes les actions effectuées ici ne requiert aucune confirmation, c'est-à-dire que vous pouvez très facilement faire des modifications idésirables sur la base de données.<br>
            </p>
            <h3>Utilisateurs</h3>
            <div class="section-admin">
                <a href="user/read-user.php"><h4>Afficher les informations d'un utilisateur</h4></a>
                <a href="user/read-all-users.php"><h4>Afficher les informations de tous les utilisateurs</h4></a>
                <a href="user/add-user.php"><h4>Créer un utilisateur</h4></a>
                <a href="user/update-user.php"><h4>Modifier les informations d'un utilisateur</h4></a>
                <a href="user/delete-user.php"><h4>Supprimer un utilisateur</h4></a>
            </div>
            <h3>Voitures</h3>
            <div class="section-admin">
                <a href="voitures/add-voiture.php"><h4>Ajouter une voiture</h4></a>
                <a href="voitures/update-voiture.php"><h4>Modifier les informations d'une voiture</h4></a>
                <a href="voitures/delete-voiture.php"><h4>Supprimer une voiture</h4></a>
            </div>
            <h3>Réservations</h3>
            <div class="section-admin">
                <a href="reservations/read-reservation.php"><h4>Afficher les réservations</h4></a>
                <a href="reservations/delete-reservation.php"><h4>Supprimer une réservation</h4></a>
            </div>
        </section>
        <?php include '../../../include/footer.php'?>
    </body>
</html>