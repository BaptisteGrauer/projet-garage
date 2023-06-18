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
            <h2>Modifier les informations d'une voiture</h2>
            <a href="../advanced-admin.php"><img src="/include/icons/arrow_back.png">Retour</a>
            <form method="POST" action="update-voiture.php" class="formulaire">
                <p>ID de la voiture à modifier</p>
                <input type="text" name="id" placeholder="ID voiture">
                <input type="submit" value="Envoyer">
            </form>
            <?php 
                include '../../../code/crud_voitures.php';
                $id = "";
                $immatriculation = "";
                $marque = "";
                $modele = "";
                $categorie = "";
                $date_mise_circulation = "";
                $prix = "";
                $date_entree_garage = "";
                $puissance = "";
                $type_carburant = "";
                $description = "";
                $photo = "";
                if ($_SERVER['REQUEST_METHOD'] == "POST" AND isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $sql = "SELECT * FROM voitures WHERE id_voiture='$id'";
                    if ($bdd->query($sql)->num_rows > 0) {
                        $row = $bdd->query($sql)->fetch_assoc();
                        $immatriculation = $row['immatriculation'];
                        $marque = $row['marque'];
                        $modele = $row['modele'];
                        $categorie = $row['categorie'];
                        $date_mise_circulation = $row['date_mise_en_circulation'];
                        $prix = $row['prix'];
                        $date_entree_garage = $row['date_entree_garage'];
                        $puissance = $row['puissance'];
                        $type_carburant = $row['type_carburant'];
                        $description = $row['description'];
                        $photo = $row['photo'];
                    }
                    else {
                        echo "La voiture n'existe pas";
                    }
                }
            ?>
            <form method="POST" action="update-voiture.php" class="formulaire" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <div>
                    <p>Immatriculation :</p>
                    <input type="text" name="uimmatriculation" placeholder="Immatriculation" value="<?php echo $immatriculation?>" required>
                </div>
                <div>
                    <p>Marque :</p>
                    <select name="umarque">
                        <?php 
                        if ($marque != ""){
                            echo "<option value ='" . $marque ."'>" . $marque  . "</option>";
                        }
                        else {
                            echo "<option value=''>Sélectionner une marque</option>";
                        }
                        ?>
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
                        <option value="RAM">RAM</option>
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
                </div>
                <div>
                    <p>Modèle :</p>
                    <input type="text" name="umodele" placeholder="Modèle" value="<?php echo $modele?>" required>
                </div>
                <div>
                    <p>Catégorie :</p>
                    <select name="ucategorie">
                        <?php 
                            if ($categorie != ""){
                                echo "<option value ='" . $categorie ."'>" . $categorie  . "</option>";
                            }
                            else {
                                echo "<option value=''>Sélectionner une catégorie</option>";
                            }
                        ?>
                        <option value="Citadine">Citadine</option>
                        <option value="SUV">SUV</option>
                        <option value="Utilitaire">Utilitaire</option>
                        <option value="Moto">Moto</option>
                        <option value="Poids-lourd">Poids-lourd</option>
                    </select>
                </div>
                <div>
                    <p>Date de mise en circulation :</p>
                    <input type="date" name="udate-mise-circulation" value="<?php echo $date_mise_circulation?>" required>
                </div>
                <div>
                    <p>Prix :</p>
                    <input type="number" name="uprix" placeholder="Prix" value="<?php echo $prix?>" required>
                </div>
                <div>
                    <p>Date d'entrée au garage :</p>
                    <input type="date" name="udate-entree-garage" value="<?php echo $date_entree_garage?>" required>
                </div>
                <div>
                    <p>Puissance :</p>
                    <input type="text" name="upuissance" placeholder="Puissance" value="<?php echo $puissance?>" required>
                </div>
                <div>
                    <p>Type de motorisation :</p>
                    <select name="utype-carburant" required>
                        <?php 
                            if ($type_carburant != ""){
                                echo "<option value ='" . $type_carburant ."'>" . $type_carburant  . "</option>";
                            }
                            else {
                                echo "<option value=''>Sélectionner un type de motorisation</option>";
                            }
                        ?>
                        <option value="Essence">Essence</option>
                        <option value="Diesel">Diesel</option>
                    </select>
                </div>
                <div>
                    <p>Description (optionnel) :</p>
                    <textarea type="text" name="udescription" row="10" cols="50" value="" placeholder="Description"><?php echo $description?></textarea>
                </div>
                <div>
                    <p>Modifier la photo (optionnel) :</p>
                    <?php 
                        echo "<img src='" . $photo ."'>";
                    ?>
                    <input type="file" name="imageToUpload">
                </div>
                <input type="submit" value="Appliquer les modifications">
            </form>
            <p class="message-php">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST"
                    AND isset($_POST['uimmatriculation'])
                    AND isset($_POST['umarque'])
                    AND isset($_POST['umodele'])
                    AND isset($_POST['ucategorie'])
                    AND isset($_POST['udate-mise-circulation'])
                    AND isset($_POST['uprix'])
                    AND isset($_POST['udate-entree-garage'])
                    AND isset($_POST['upuissance'])
                    AND isset($_POST['utype-carburant'])
                    AND isset($_POST['udescription'])
                    ){
                        $immatriculation = $_POST["uimmatriculation"];
                        $marque = $_POST['umarque'];
                        $modele = $_POST['umodele'];
                        $categorie = $_POST['ucategorie'];
                        $date_mise_circulation = $_POST['udate-mise-circulation'];
                        $prix = $_POST['uprix'];
                        $date_entree_garage = $_POST['udate-entree-garage'];
                        $puissance = $_POST['upuissance'];
                        $type_carburant = $_POST['utype-carburant'];
                        $description = $_POST['udescription'];
                        if (isset($_FILES['imageToUpload'])) {
                            move_uploaded_file($_FILES['imageToUpload']['tmp_name'], $dir . $_FILES['imageToUpload']['name']);
                            $photo = "/images/voitures/". $_FILES['imageToUpload']['name'];
                        }
                        else {
                            $photo = $row['photo'];
                        }
                        echo update_voiture($id, $immatriculation, $marque, $modele, $categorie, $date_mise_circulation, $prix, $date_entree_garage, $puissance, $description, $photo, $bdd);
                    }
                ?>
            </p>
            <?php include "all-voitures.php"?>
        </section>
        <?php include '../../../include/footer.php'?>
    </body>
</html>