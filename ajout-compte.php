<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'?>
        <title>Projet Garage</title>
    </head>
    <body>
        <?php include 'include/header.php'?>
        <section class="contenu">
            <h2>Création de compte</h2>
            <form method="POST" action="ajout-compte.php" class="formulaire">
                <input type="text" name="email" placeholder="Adresse e-mail">
                <input type="text" name="nom" placeholder="Nom d'utilisateur">
                <input type="password" name="mdp" placeholder="mot de passe">
                <input type="password" name="confirmation-mdp" placeholder="Confirmer le mot de passe">
                <input type="submit" value="Créer le compte">
            </form>
            <p class="message-php">
                <?php
                require "code/crud_users.php";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $email = $_POST["email"];
                    $nom = $_POST["nom"];
                    $mdp = $_POST["mdp"];
                    $confirmation_mdp = $_POST["confirmation-mdp"];
                    if ($email == "" OR $nom == "" OR $mdp == "" OR $confirmation_mdp ==""){
                        echo "Un des champs est vide, veuillez entrer des valeurs valides";
                    }   
                    elseif ($mdp != $confirmation_mdp){
                        echo "Les mots de passe ne correspondent pas, veuillez vérifier qu'ils soient identiques.";
                    }
                    else {
                        $mdp_hash = hash('sha256',$mdp);
                        create_user($email, $nom, $mdp_hash, $conn);
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