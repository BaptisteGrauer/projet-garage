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
            <h2>Afficher toutes les voitures</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Immatriculation</th>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Catégorie</th>
                        <th>Date de mise en circulation</th>
                        <th>prix</th>
                        <th>Date d'entrée au garage</th>
                        <th>Puissance</th>
                        <th>Type de carburant</th>
                        <th>Description</th>
                        <th>Etat réservation</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "../../../../code/crud_voitures.php";
                    read_all_voiture_complete($bdd)
                    ?>
                </tbody>
            </table>
            <?php include "all-voitures.php"?>
        </section>
        <?php include '../../../../include/footer.php'?>
    </body>
</html>
