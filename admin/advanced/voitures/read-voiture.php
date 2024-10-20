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
            <h2>Afficher toutes les voitures</h2>
            <a href="../advanced-admin.php"><img src="/include/icons/arrow_back.png">Retour</a>
            <table>
                <thead>
                    <tr>
                        <th>ID voiture</th>
                        <th>Immatriculation</th>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Catégorie</th>
                        <th>Date mise en route</th>
                        <th>Prix</th>
                        <th>Date d'entrée au garage</th>
                        <th>Puissance</th>
                        <th>Carburant</th>
                        <th>Description</th>
                        <th>Réservé</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "../../../code/crud_voitures.php";
                    read_all_voiture_complete($bdd)
                    ?>
                </tbody>
            </table>
            <?php include "all-voitures.php"?>
            </section>
        <?php include '../../../include/footer.php'?>
    </body>
</html>
