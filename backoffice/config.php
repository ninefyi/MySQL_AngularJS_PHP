<?php
    include_once("../config.php");
    session_start();
    if(empty($_SESSION['admin'])){
        header("Location:index.php");
    }
?>