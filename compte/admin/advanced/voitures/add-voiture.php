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
            <h2>Ajouter</h2>
            <form method="POST" action="add-voiture.php" class="formulaire">
                <p>Ajouter une nouvelle voiture</p>
                <input type="text" name="cimmatriculation" placeholder="Immatriculation" required>
                <label for="cmarque">Marque</label>
                <select name="cmarque">
                    <option value="">Sélectionner une marque</option>
                    <option value="Acura">Acura</option>
                    <option value="Alfa Romeo">Alfa Romeo</option>
                    <option value="Aston Martin">Aston Martin</option>
                    <option value="Audi">Audi</option>
                    <option value="Bentley">Bentley</option>
                    <option value="BMW">BMW</option>
                    <option value="Bugatti">Bugatti</option>
                    <option value="Cadillac">Cadillac</option>
                    <option value="Chevrolet">Chevrolet</option>
                    <option value="Chery">Chery</option>
                    <option value="Chrysler">Chrysler</option>
                    <option value="Citroën">Citroën</option>
                    <option value="Dacia">Dacia</option>
                    <option value="Daewoo">Daewoo</option>
                    <option value="Dodge">Dodge</option>
                    <option value="Ferrari">Ferrari</option>
                    <option value="Fiat">Fiat</option>
                    <option value="Ford">Ford</option>
                    <option value="Geely">Geely</option>
                    <option value="GMC">GMC</option>
                    <option value="Honda">Honda</option>
                    <option value="Hummer">Hummer</option>
                    <option value="Hyundai">Hyundai</option>
                    <option value="Infiniti">Infiniti</option>
                    <option value="Isuzu">Isuzu</option>
                    <option value="JAC Motors">JAC Motors</option>
                    <option value="Jaguar">Jaguar</option>
                    <option value="Jeep">Jeep</option>
                    <option value="Kawasaki">Kawasaki</option>
                    <option value="Kia">Kia</option>
                    <option value="Koenigsegg">Koenigsegg</option>
                    <option value="Lamborghini">Lamborghini</option>
                    <option value="Lancia">Lancia</option>
                    <option value="Land Rover">Land Rover</option>
                    <option value="Lexus">Lexus</option>
                    <option value="Lincoln">Lincoln</option>
                    <option value="Lotus">Lotus</option>
                    <option value="Mahindra">Mahindra</option>
                    <option value="Maserati">Maserati</option>
                    <option value="Maybach">Maybach</option>
                    <option value="Mazda">Mazda</option>
                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                    <option value="MG">MG</option>
                    <option value="Mini">Mini</option>
                    <option value="Mitsubishi">Mitsubishi</option>
                    <option value="Nissan">Nissan</option>
                    <option value="Opel">Opel</option>
                    <option value="Pagani">Pagani</option>
                    <option value="Peugeot">Peugeot</option>
                    <option value="Pontiac">Pontiac</option>
                    <option value="Porsche">Porsche</option>
                    <option value="Proton">Proton</option>
                    <option value="Renault">Renault</option>
                    <option value="Rolls-Royce">Rolls-Royce</option>
                    <option value="Rover">Rover</option>
                    <option value="Smart">Smart</option>
                    <option value="Subaru">Subaru</option>
                    <option value="Suzuki">Suzuki</option>
                    <option value="Tesla">Tesla</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Vauxhall">Vauxhall</option>
                    <option value="Volkswagen">Volkswagen</option>
                    <option value="Volvo">Volvo</option>
                </select>
                <input type="text" name="cmodele" placeholder="Modèle" required>
                <p>Date de mise en circulation :</p>
                <input type="date" name="cdate-mise-circulation" required>
                <input type="number" name="cprix" placeholder="Prix" required>
                <p>Date d'entrée au garage :</p>
                <input type="date" name="cdate-entree-garage" required>
                <input type="text" name="cpuissance" placeholder="Puissance" required>
                <input type="text" name="ctype-carburant" placeholder="Type de carburant" required>
                <input type="text" name="cdescription" placeholder="Description">
                <p>Ajouter une photo :</p>
                <input type="file" name="cphoto">
                <input type="submit" value="Ajouter la voiture">
            </form>
            <p class="message-php" id="cuser">
                    <?php
                        include '../../../../code/crud_voitures.php';
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
            <?php include "all-voitures.php"?>
        </section>
        <?php include '../../../../include/footer.php'?>
    </body>
</html>
