<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'?>
    </head>
    <body>
        <?php include 'include/header.php'?>
        <section class="contenu">
            <h2>Parcourir les voitures</h2>
            <a href="index.php"><img src="/include/icons/arrow_back.png">Retour</a>
            <div class="liste-voiture">
                <?php
                    include "code/crud_voitures.php";
                    read_all_voiture($bdd);
                ?>
            </div>
        </section>
        <?php include 'include/footer.php'?>
    </body>
</html>