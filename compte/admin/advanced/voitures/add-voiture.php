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
            <h2>Ajouter</h2>
            <form method="POST" action="add-voiture.php" class="formulaire">
                <p>Créer un nouvelle voiture</p>
                <input type="text" name="cimmatriculation" placeholder="Immatriculation">
                <input type="text" name="cmarque" placeholder="Marque">
                <input type="text" name="cmodele" placeholder="Modèle">
                <p>Date de mise en circulation :</p>
                <input type="date" name="cdate-mise-circulation">
                <input type="text" name="cprix" placeholder="Prix">
                <p>Date d'entrée au garage :</p>
                <input type="date" name="cdate-entree-garage">
                <input type="text" name="cpuissance" placeholder="Puissance">
                <input type="text" name="ctype-carburant" placeholder="Type de carburant">
                <input type="text" name="cdescription" placeholder="Description">
                <input type="file" name="cphoto">
                <input type="submit" value="Ajouter la voiture">
                <p class="message-php" id="cuser">
                    <?php
                        include '../../../code/crud_voitures.php';
                        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                            $immatriculation = $_POST["cimmatriculation"];
                            $marque = $_POST['cmarque'];
                            $modele = $_POST['cmodele'];
                            $cdate_mise_circulation = $_POST['cdate-mise-circulation'];
                            $prix = $_POST['cprix'];
                            $date_entree_garage = $_POST['cdate-entree-garage'];
                            $puissance = $_POST['cpuissance'];
                            $type_carburant = $_POST['ctype-carburant'];
                            $description = $_POST['cdescription'];
                            $photo = $_POST['cphoto'];
                        }
                    ?>
                </p>
            </form>
            <?php include "all-voitures.php"?>
        </section>
        <?php include '../../../include/footer.php'?>
    </body>
</html>
