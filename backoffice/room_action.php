<?php ob_start();

    require_once "config.php";

    $op = $_REQUEST['op'];

    if($op == "load_room"){
        load_room();
    }else if($op == "create_room"){
        create_room();
    }else if($op == "update_room"){
        update_room();
    }else if($op == "delete_room"){
        delete_room();
    }

    function load_room($room_no = ""){
        global $conn;
        $array['records'] = array();
        try{
            $where = "";
            if(!empty($room_no)){
                $where = " room_no = '$room_no' ";
            }
            $sql = "select *, DATE_FORMAT(login_date,'%d/%m/%Y') as dylogin from room_account where 1=1";
            $stmt = $conn->query($sql);
            $rs = $stmt->fetchAll();
            foreach($rs as $row){
                $array['records'][] = array(
                    "no" => $row['room_no'],
                    "password" => $row['room_password'],
                    "date" => $row['dylogin']
                , );
            }
        }catch (Exception $ex){
            $array['error'] = $ex->getMessage();
        }
        echo json_encode($array);
    }

    function create_room(){
        global $conn;
        $array = array();
        try{
            $room_no = $_GET['room_no'];
            $room_password = $_GET['room_password'];
            if(!empty($room_no) and !empty($room_password)){
                $sql = "INSERT INTO room_account(room_no, room_password) VALUES(?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $room_no, PDO::PARAM_INT);
                $stmt->bindParam(2, $room_password, PDO::PARAM_STR, 10);
                $stmt->execute();
            }else{
                $array['error'] = "Error create_room";
            }

        }catch (Exception $ex){
            $array['error'] = $ex->getMessage();
        }
        echo json_encode($array);
    }

    function update_room(){
        global $conn;
        $array = array();
        try{
            $room_no = $_GET['room_no'];
            $room_password = $_GET['room_password'];
            if(!empty($room_no)){
                $sql = "UPDATE room_account SET room_password='$room_password' WHERE room_no='$room_no' ";
                $conn->query($sql);
            }

        }catch (Exception $ex){
            $array['error'] = $ex->getMessage();
        }
        echo json_encode($array);
    }

    function delete_room(){
        global $conn;
        $array = array();
        try{
            $room_no = $_GET['room_no'];
            if(!empty($room_no)){
                $sql = "DELETE FROM room_account WHERE room_no='$room_no' ";
                $conn->query($sql);
            }

        }catch (Exception $ex){
            $array['error'] = $ex->getMessage();
        }
        echo json_encode($array);
    }

ob_end_flush();?>