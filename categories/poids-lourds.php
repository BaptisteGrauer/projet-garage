<!DOCTYPE html>
<html>
    <head>
        <?php include '../include/head.php'?>
    </head>
    <body>
        <?php include '../include/header.php'?>
        <section class="contenu">
            <h2>Poids-lourds</h2>
            <div class="liste-voiture">
                <?php 
                include "../code/crud_voitures.php";
                read_all_voiture_text_categorie('poids-lourd',$bdd)
                ?>
            </div>
        </section>
        <?php include '../include/footer.php'?>
    </body>
</html>