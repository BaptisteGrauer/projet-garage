<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'?>
    </head>
    <body>
        <?php include 'include/header.php'?>
        <section class="contenu">
            <h1>Créer un compte</h1>
            <form method="POST" action="ajout-compte.php" class="formulaire">
                <input type="text" name="nom" placeholder="Nom d'utilisateur" required>
                <input type="password" name="mdp" placeholder="mot de passe" required>
                <input type="password" name="confirmation-mdp" placeholder="Confirmer le mot de passe" required>
                <input type="submit" value="Créer le compte">
            </form>
            <p class="message-php">
                <?php
                require "code/crud_users.php";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nom = $_POST["nom"];
                    $mdp = $_POST["mdp"];
                    $confirmation_mdp = $_POST["confirmation-mdp"];
                    if ($mdp != $confirmation_mdp){
                        echo "Les mots de passe ne correspondent pas, veuillez vérifier qu'ils soient identiques.";
                    }
                    else {
                        $mdp_hash = hash('sha256',$mdp);
                        create_user($nom, $mdp_hash, $bdd);
                        header('Location: connexion.php');
                    }
                }
                ?>
            </p>
            <p>
                En cliquant sur "créer le compte", vous acceptez avoir pris connaissance des éléments suivant :
                <ul>
                    <li><a href="/autres/tos.php">Conditions générales d'utilisation</a></li>
                    <li><a href="/autres/privacy.php">charte de confidentialité</a></li>
                    <li><a href="/autres/legal.php">mentions légales</a></li>
                </ul>
            </p>
        </section>
        <?php include 'include/footer.php'?>
    </body>
</html>