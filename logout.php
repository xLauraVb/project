<?php 
    setcookie("loggedin", "", time()-3600);
    header('Location: login.php');

?>
