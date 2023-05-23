<!DOCTYPE html>
<html>
    <head>
        <?php include '../include/head.php'?>
    </head>
    <body>
        <?php include '../include/header.php'?>
        <section class="contenu">
            <h1>Bienvenue, <?php echo $_COOKIE['nom']?></h1>
            <a href="dashboard/user-settings.php">Paramètres du compte</a>
            <?php if ($_COOKIE['admin'] == 1) {
                echo "<a href='admin/admin.php'>Accéder au panneau d'administration</a>";
            }
            ?>
            <form method="POST" action="../logout.php" class="formulaire">
                <input type="submit" value="Se déconnecter">
            </form>
        </section>
        <?php include '../include/footer.php'?>
    </body>
</html>