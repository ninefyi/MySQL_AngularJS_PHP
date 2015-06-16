<?php ob_start();

    require_once "config.php";

    $op = $_REQUEST['op'];

    if($op == "check_login"){
        check_login();
    }

    function check_login(){
        global $conn;
        try{
            $login = $_POST['login'];
            $password = $_POST['password'];
            $sql = "select room_no from room_account where room_no=? and room_password=? ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $login);
            $stmt->bindParam(2, $password);
            $stmt->execute();
            $rs = $stmt->fetchAll();
            if(!empty($rs)) {
                session_start();
                foreach ($rs as $row) {
                    $_SESSION['room_no'] = $row['room_no'];
                }
                echo $_SESSION['room_no'];
            }
            $sql = "UPDATE room_account
                    SET login_date = NOW()
                    WHERE room_no='$login' ";
            $conn->query($sql);
        }catch (Exception $ex){
            echo $ex->getMessage();
        }
    }


ob_end_flush();?>