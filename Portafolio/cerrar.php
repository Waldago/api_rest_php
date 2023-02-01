<?php include "cabecera.php"; ?>
<?php include "pie.php" ?>
<?php 

    session_start();

    session_destroy();

    header("location: login.php");
?>