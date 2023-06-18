<?php 
if (!isset($_COOKIE['nom'])) {
    header('Location: /index.php');
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
            <h1>Vos réservations</h1>
            <a href="compte.php"><img src='../include/icons/arrow_back.png'>Retour gestion du compte</a>
            <?php 
                include "../code/crud_reservations.php";
                include "../code/crud_voitures.php";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $id_voiture = $_POST['id_voiture'];
                    $sql = "SELECT etat_reservation FROM voitures WHERE id_voiture='$id_voiture'";
                    $result = $bdd->query($sql);
                    $row = $result->fetch_assoc();
                    if ($row['etat_reservation'] == 0) {
                        $id_utilisateur = $_COOKIE['id'];
                        $date_reservation = date("Y-m-d");
                        create_reservation($id_voiture, $id_utilisateur, $date_reservation, $bdd);
                        update_voiture_reservation($id_voiture, 1, $bdd);
                        echo "Réservation effectuée avec succès";
                    }
                    else {
                        echo "Désolé, la voiture est déjà réservée.";
                    }
                }
            ?>
            <div>
                <?php 
                    read_all_reservation_user($_COOKIE['id'],$bdd);
                ?>
            </div>
            <input type="submit" value="Procéder au paiment (pas encore implémenté)">
        </section>
        <?php include '../include/footer.php'?>
    </body>
</html>