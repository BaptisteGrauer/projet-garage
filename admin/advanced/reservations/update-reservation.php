<?php 
if (isset($_COOKIE['admin'])){
    if ($_COOKIE['admin'] != 1) {
        header('Location: ../../compte/compte.php');
    }
}
else {
    header('Location: ../../../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../../../include/head.php'?>
    </head>
    <body>
        <?php include '../../../include/header.php'?>
        <section class="contenu">
            <h1>Modifier une réservation</h1>
            <a href="../advanced-admin.php"><img src="/include/icons/arrow_back.png">Retour</a>
        </section>
        <?php include '../../../include/footer.php'?>
    </body>
</html>