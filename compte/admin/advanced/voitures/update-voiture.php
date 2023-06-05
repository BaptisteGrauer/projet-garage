<?php 
if (isset($_COOKIE['admin'])){
    if ($_COOKIE['admin'] != 1) {
        header('Location: ../../../compte.php');
    }
}
else {
    header('Location: ../../../../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../../../../include/head.php'?>
    </head>
    <body>
        <?php include '../../../../include/header.php'?>
        <section class="contenu">
            <h1>Modifier les informations d'une voiture</h1>
        </section>
        <?php include '../../../../include/footer.php'?>
    </body>
</html>