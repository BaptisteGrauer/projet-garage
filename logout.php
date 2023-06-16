<?php
if(isset($_COOKIE)) {
    setcookie('id',$id,-1);
    setcookie('nom',$nom,-1);
    setcookie('admin',$admin,-1);
    header('Location: /index.php');
}
header('Location: /index.php');
?>
