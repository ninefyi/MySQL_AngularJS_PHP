<?php ob_start();

    require_once "config.php";

    $op = $_REQUEST['op'];

    if($op == "load_internet_room"){
        load_internet_room();
    }else if($op == "save_internet_room"){

    }else if($op == "update_internet_room"){

    }else if($op == "delete_internet_room"){

    }

    function load_internet_room($internet_no = ""){
        global $conn;
        $array['records'] = array();
        try{
            $where = "";
            if(!empty($id)){
                $where = " internet_room_id = '$internet_no' ";
            }
            $sql = "select *, DATE_FORMAT(activate_date,'%d/%m/%Y') as blogin from internet_room where 1=1";
            $stmt = $conn->query($sql);
            $rs = $stmt->fetchAll();
            foreach($rs as $row){
                $array['records'][] = array(
                    "id" => $row['internet_id'],
                    "login" => $row['internet_login'],
                    "roomno" => $row['room_no'],
                    "date" => $row['blogin']
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