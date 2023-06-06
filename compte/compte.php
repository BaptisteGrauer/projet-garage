<!DOCTYPE html>
<html>
    <head>
        <?php include '../include/head.php'?>
    </head>
    <body>
        <?php include '../include/header.php'?>
        <section class="contenu">
            <h1>Bienvenue, <?php echo $_COOKIE['nom']?></h1>
            <div>
                <img src="../include/icons/cart.png">
                <a href="reservation.php">Vos réservations</a>
            </div>
            <div>
                <img src="../include/icons/account_settings.png">
                <a href="compte-update.php">Modifier les informations de votre compte</a>
            </div>
            <?php if ($_COOKIE['admin'] == 1) {
                echo
                "<div>
                    <img src='../include/icons/settings.png'>
                    <a href='admin/admin.php'>Accéder au panneau d'administration</a>
                </div>";
            }
            ?>
            <form method="POST" action="../logout.php">
                <img src='../include/icons/logout.png'>
                <input type="submit" value="Se déconnecter">
            </form>
        </section>
        <?php include '../include/footer.php'?>
    </body>
</html>