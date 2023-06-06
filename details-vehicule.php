<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'?>
    </head>
    <body>
        <?php include 'include/header.php'?>
        <section class="contenu">
            <h2>Détails du véhicule</h2>
            <div class="details-voiture">
                <?php 
                    $id_voiture = $_GET['id'];
                    include "code/crud_voitures.php";
                    read_voiture_id($id_voiture,$conn);
                ?>
            </div>
            <div>
                <?php
                    if (isset($_COOKIE['id'])) {
                        echo 
                        "<form method='POST' action='compte/reservation.php'>
                            <input type='hidden' name='id_voiture' value='$id_voiture'>
                            <input type='submit' value='Réserver maintenant'>
                        </form>";
                    }
                    else {
                        echo 'Vous devez être connecté pour pouvoir effectuer une réservation';
                    }
                ?>
            </div>
        </section>
        <?php include 'include/footer.php'?>
    </body>
</html>