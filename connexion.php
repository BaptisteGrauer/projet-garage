<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'?>
    </head>
    <body>
        <?php include 'include/header.php'?>
        <section class="contenu">
            <h1>Connexion</h1>
            <form method="POST" action="connexion.php" class="formulaire">
                <p>Nom d'utilisateur :</p>
                <input type="text" name="nom" placeholder="Nom d'utilisateur" required>
                <p>Mot de passe :</p>
                <input type="password" name="mdp" placeholder="mot de passe" required>
                <input type="submit" value="envoyer">
            </form>
            <p class ="message-php">
                <?php
                include "code/crud_users.php";
                if($_SERVER['REQUEST_METHOD'] == "POST") {
                    $nom = $_POST['nom'];
                    $mdp = hash('sha256', $_POST['mdp']); // Hachage direct du mot de passe en SHA256
                    echo connexion($nom, $mdp, $bdd);
                }
                ?>
            </p>
            <p>Pas de compte ? <a href="ajout-compte.php">Créez-en un ici !</a></p>
        </section>
        <?php include 'include/footer.php'?>
    </body>
</html>