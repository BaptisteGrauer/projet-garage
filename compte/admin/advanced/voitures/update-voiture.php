<?php 
if (isset($_COOKIE['admin'])){
    if ($_COOKIE['admin'] != 1) {
        header('Location: ../../compte.php');
    }
}
else {
    header('Location: ../../../index.php');
}
?>
