<?php session_start();
    $_SESSION['admin'] = null;
    unset($_SESSION['admin']);
    header("Location:index.php");
?>