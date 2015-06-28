<?php ob_start();
    require_once "config.php";

    $op = $_REQUEST['op'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    if($op == "check_login"){
        if($login == "bncadmin" and $password == "Cake010012"){
            session_start();
            $_SESSION['admin'] = 99;
            echo "main.php";
        }else{
            echo "index.php";
        }
    }


ob_end_flush();?>