<?php
    include_once("../config.php");
    if(empty($_SESSION['room_no'])){
        header("Location:login.php");
    }
?>