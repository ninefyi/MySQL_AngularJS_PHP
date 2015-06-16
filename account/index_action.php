<?php ob_start();
    session_start();
    require_once "config.php";

    $op = $_REQUEST['op'];

    if($op == "get_current_internet_account"){
        get_current_internet_account(0);
    }else if($op == "logout"){
        $_SESSION['room_no'] = null;
        unset($_SESSION['room_no']);
        echo "login.php";
    }else if($op == "history"){
        get_current_internet_account(1);
    }else if($op == "create"){
        create_internet_account();
        get_current_internet_account(0);
    }

    function create_internet_account(){
        global $conn;
        try{
            $room_no = $_SESSION['room_no'];
            $sql = "SELECT internet_login
                    FROM internet_account
                    WHERE activate = 0
                    LIMIT 1";
            $stmt = $conn->query($sql);
            $rs = $stmt->fetchAll();
            foreach($rs as $row){
                $login = $row['internet_login'];
            }
            if(!empty($login) and !empty($room_no)){
                $sql = "INSERT INTO internet_room(room_no, internet_login, activate_date)
                    VALUES($room_no, '$login', NOW())";
                $conn->query($sql);

                $sql = "UPDATE internet_account
                    SET activate = 1
                    WHERE internet_login = '$login'";
                $conn->query($sql);
            }


        }catch (Exception $ex){
            $array['error'] = $ex->getMessage();
        }
//        echo json_encode($array);
    }

    function get_current_internet_account($history = 0){
        global $conn;
        $array['records'] = array();
        try{
            $limit = "limit 1";
            if($history == 1){
                $limit = "";
            }
            $sql = "select r.internet_room_id
                      , r.internet_login
                      , a.internet_password
                      , r.room_no
                      , DATE_FORMAT(activate_date,'%d/%m/%Y') as alogin
                    from internet_room as r
                    inner join internet_account as a on a.internet_login = r.internet_login
                    where room_no=?
                    order by activate_date desc
                    $limit  ";
            #echo $sql;
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $_SESSION['room_no']);
            $stmt->execute();
            $rs = $stmt->fetchAll();
            if(!empty($rs)) {
                foreach ($rs as $row) {
                    $array['records'][] = array(
                        "id" => $row['internet_room_id'],
                        "login" => $row['internet_login'],
                        "password" => $row['internet_password'],
                        "room" => $row['room_no'],
                        "date" => $row['alogin']
                    , );
                }
            }

        }catch (Exception $ex){
            $array['error'] = $ex->getMessage();
        }
        echo json_encode($array);
    }


ob_end_flush();?>