<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'?>
    </head>
    <body>
        <?php include 'include/header.php'?>
        <section class="contenu">
            <img src="/include/icons/garageR.png" class="logo">
            <h1>Accueil</h1>
            <p>Ce site est un de mes projet que j'ai réalisé lors de mon BTS SIO, de ce fait, ce service est purement fictif</p>
            <h2>Dernières entrées dans le garage</h2>
            <div class="liste-voiture">
                <?php 
                    include "code/crud_voitures.php";
                    read_3_voiture_last($bdd)
                ?>
            </div>
            <h2>Parcourir les véhicules par catégorie</h2>
            <div class="liste-categories" id="liste-categories">
                <a href="categories/citadines.php" class="categorie" id="categorie-citadines"><p>Citadines</p></a>
                <a href="categories/suv.php" class="categorie" id="categorie-suvs"><p>SUV</p></a>
                <a href="categories/utilitaires.php" class="categorie" id="categorie-utilitaires"><p>Utilitaires</p></a>
                <a href="categories/motos.php" class="categorie" id="categorie-motos"><p>Motos</p></a>
                <a href="categories/poids-lourds.php" class="categorie" id="categorie-poids-lourds"><p>Poids lourds</p></a>
            </div>
            <h2>Véhicules recommandés</h2>
            <div class="liste-voiture">
                <?php 
                    read_6_voiture_random($bdd);
                ?>
            </div>
            <a href="voitures.php" id="voir-tout">Voir tout</a>
        </section>
        <?php include 'include/footer.php'?>
    </body>
</html>