<?php 

if (!isset($_SESSION['userData'])) {
    header('Location: login.php');
}

?>