<?php
session_start();
 unset($_SESSION['pseudo']);
 //session_destroy();
 var_dump($_SESSION['pseudo']);
 header('location:index.php');
?>
