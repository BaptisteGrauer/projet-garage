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
                include "code/crud_voitures.php";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $recherche = $_POST['recherche'];
                    echo "<h2>Résultat de la recherche pour \"$recherche\"</h2>";
                    $sql = "SELECT id_voiture, marque, modele, description FROM voitures WHERE etat_reservation=0 AND (marque LIKE '%$recherche%' OR modele LIKE '%$recherche%' OR description LIKE '%$recherche%')";
                    $resultat = $bdd->query($sql);
                    if($resultat->num_rows > 0) {
                        while($row = $resultat->fetch_assoc()) {
                            $id = $row['id_voiture'];
                            read_voiture_id($id, $bdd);
                        }
                    }
                }
            ?>
        </section>
        <?php include 'include/footer.php'?>
    </body>
</html>