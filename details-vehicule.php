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
                    $id = $_GET['id'];
                    include "code/crud_voitures.php";
                    read_voiture_id($id,$conn);
                ?>
            </div>
        </section>
        <?php include 'include/footer.php'?>
    </body>
</html>