<?php ob_start();

    require_once "config.php";

    $op = $_REQUEST['op'];

    if($op == "load_room"){
        load_room();
    }else if($op == "save_room"){

    }else if($op == "update_room"){

    }else if($op == "delete_room"){

    }

    function load_room($room_no = ""){
        global $conn;
        $array['records'] = array();
        try{
            $where = "";
            if(!empty($id)){
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

    function save_room(){

    }

    function update_room(){

    }

    function delete_room(){

    }

ob_end_flush();?>