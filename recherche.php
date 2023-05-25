<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'?>
    </head>
    <body>
        <?php include 'include/header.php'?>
        <section class="contenu">
            <h1>Recherche</h1>
            <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $recherche = $_POST['recherche'];
                echo "Résultat de la recherche pour \"$recherche\"";
            }
            ?>
        </section>
        <?php include 'include/footer.php'?>
    </body>
</html>