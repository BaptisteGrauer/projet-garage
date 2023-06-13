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
            <h2>Supprimer</h2>
            <a href="../advanced-admin.php"><img src="/include/icons/arrow_back.png">Retour</a>
            <form method="POST" action="delete-voiture.php" class="formulaire">
                <h3>Supprimer une voiture</h3>
                <input type="text" name="did" placeholder="ID voiture" required>
                <input type="submit" value="Supprimer la voiture">
            </form>
            <p class="message-php">
                <?php 
                include '../../../code/crud_voitures.php';
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $id = $_POST["did"];
                    $sql = "SELECT id_voiture FROM voitures WHERE id_voiture='$id'";
                    $result = $bdd->query($sql);
                    $row = $result->fetch_assoc();
                    if ($result->num_rows > 0) {
                        $id = $row["id_voiture"];
                        echo delete_voiture($id,$bdd);
                    }
                    else {
                        echo "La voiture $id n'existe pas";
                    }
                }
                ?>
            </p>
            <?php include "all-voitures.php"?>
            </section>
        <?php include '../../../include/footer.php'?>
    </body>
</html>
