<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'?>
        <title>Accueil</title>
    </head>
    <body>
        <?php include 'include/header.php'?>
        <section class="contenu">
            <h1>Connexion</h1>
            <form method="POST" action="connexion.php" class="formulaire">
                <label for="email">Nom d'utilisateur :</label>
                <input type="text" name="nom" placeholder="Nom d'utilisateur" required>
                <label for="mdp">Mot de passe :</label>
                <input type="password" name="mdp" placeholder="mot de passe" required>
                <input type="submit" value="envoyer">
            </form>
            <p class ="message-php">
                <?php
                include "login.php";
                echo login();
                ?>
            </p>
            <p>Pas de compte ? <a href="ajout-compte.php">Créez-en un ici</a></p>
        </section>
        <?php include 'include/footer.php'?>
    </body>
</html>