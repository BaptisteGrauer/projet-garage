<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'?>
        <title>Projet Garage</title>
    </head>
    <body>
        <?php include 'include/header.php'?>
        <section class="contenu">
            <h2>Accueil</h2>
            <h3>Parcourir les véhicules par catégorie</h3>
            <div class="liste-categories" id="liste-categories">
                <a href="categories/voitures.php" class="categorie" id="categorie-citadines"><p>Citadines</p></a>
                <a href="categories/voitures.php" class="categorie" id="categorie-suvs"><p>SUV</p></a>
                <a href="categories/utilitaires.php" class="categorie" id="categorie-utilitaires"><p>Utilitaires</p></a>
                <a href="categories/motos.php" class="categorie" id="categorie-motos"><p>Motos</p></a>
                <a href="categories/poids-lourds.php" class="categorie" id="categorie-poids-lourds"><p>Poids lourds</p></a>
            </div>
            <h3>Dernières entrées dans le garage</h3>
            <div class="liste-voiture">
                <?php 
                include "code/crud_voitures.php";
                read_all_voiture($conn)
                ?>
            </div>
        </section>
        <?php include 'include/footer.php'?>
    </body>
</html>