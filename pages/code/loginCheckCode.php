<?php 
 if(!isset($_SESSION['name']) || !isset($_SESSION['id']))
 {
    header("Location: ./login.php");
 }
?>