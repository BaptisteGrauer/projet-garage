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
            <?php 
                include "../../../code/crud_reservations.php";
            ?>
            <form method="POST" action="delete-reservation.php"class="formulaire">
                <input type="text" name="did" placeholder="N° de réservation à supprimer" required>
                <input type="submit" value="supprimer la réservation">
            </form>
            <div class="message-php">
                <?php 
                    include '../../../code/crud_voitures.php';
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $id_reservation = $_POST["did"];
                        $sql = "SELECT * FROM reservations WHERE id_reservation='$id_reservation'";
                        $result = $bdd->query($sql);
                        $row = $result->fetch_assoc();
                        if ($result->num_rows > 0) {
                            $id_reservation = $row["id_reservation"];
                            $id_voiture = $row['id_voiture'];
                            update_voiture_reservation($id_voiture,0,$bdd);
                            echo delete_reservation($id_reservation,$bdd);
                        }
                        else {
                            echo "La réservation N°$id_reservation n'existe pas";
                        }
                    }
                ?>
            </div>
            <?php include 'all-reservation.php'?>
        </section>
        <?php include '../../../include/footer.php'?>
    </body>
</html>
