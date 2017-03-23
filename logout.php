<?php 
    setcookie("loggedin", "", time()-3600);
    header('Location: regristratie.php');

?>
