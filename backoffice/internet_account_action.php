<?php ob_start();

    require_once "config.php";

    $op = $_REQUEST['op'];

    if($op == "load_internet_account"){
        load_internet_account();
    }else if($op == "save_internet_account"){

    }else if($op == "update_internet_account"){

    }else if($op == "delete_internet_account"){

    }

    function load_internet_account($account_no = ""){
        global $conn;
        $array['records'] = array();
        try{
            $where = "";
            if(!empty($id)){
                $where = " internet_id = '$account_no' ";
            }
            $sql = "select *, DATE_FORMAT(build_date,'%d/%m/%Y') as blogin from internet_account where 1=1";
            $stmt = $conn->query($sql);
            $rs = $stmt->fetchAll();
            foreach($rs as $row){
                $array['records'][] = array(
                    "id" => $row['internet_id'],
                    "login" => $row['internet_login'],
                    "password" => $row['internet_password'],
                    "policy" => $row['internet_policy'],
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