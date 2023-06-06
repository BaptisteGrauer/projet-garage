<!DOCTYPE html>
<html>
    <head>
        <?php include '../include/head.php'?>
    </head>
    <body>
        <?php include '../include/header.php'?>
        <section class="contenu">
            <h1>Réservation</h1>
            <?php 
                include "../code/crud_reservations.php";
                include "../code/crud_voitures.php";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $id_voiture = $_POST['id_voiture'];
                    $sql = "SELECT etat_reservation FROM voitures WHERE id_voiture='$id_voiture'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    if ($row['etat_reservation'] == 0) {
                        $id_utilisateur = $_COOKIE['id'];
                        $date_reservation = date("Y-m-d");
                        create_reservation($id_voiture, $id_utilisateur, $date_reservation, $conn);
                        update_voiture_reservation($id_voiture, 1, $conn);
                        echo "Réservation effectuée avec succès";
                    }
                    else {
                        echo "Désolé, la voiture est déjà réservée.";
                    }
                }
            ?>
            <h2>Vos réservations</h2>
            <div>
                <?php 
                    read_all_reservation_user($_COOKIE['id'],$conn);
                ?>
            </div>
            <a href="compte.php">Retour gestion du compte</a>
        </section>
        <?php include '../include/footer.php'?>
    </body>
</html>