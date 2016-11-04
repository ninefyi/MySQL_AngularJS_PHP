<?php ob_start();

    require_once "config.php";

    $op = $_REQUEST['op'];

    if($op == "load_internet_account"){
        load_internet_account();
    }else if($op == "delete_internet_account"){
        delete_internet_account();
    }

    function delete_internet_account(){
        global $conn;
        $array = array();
        try{
            $internet_id = $_GET['internet_id'];
            if(!empty($internet_id)){
                $sql = "DELETE FROM internet_account WHERE internet_id='$internet_id' ";
                $conn->query($sql);
            }

        }catch (Exception $ex){
            $array['error'] = $ex->getMessage();
        }
        echo json_encode($array);
    }

    function load_internet_account(){
        global $conn;
        $array['records'] = array();
        try{
            $where = "";
            if(!empty($_GET['policy'])){
                $where .= " AND internet_policy='{$_GET[policy]}'";
            }
            if($_GET['activate'] != ""){
                $where .= "AND activate='{$_GET[activate]}'";
            }
            $sql = "select *, DATE_FORMAT(build_date,'%d/%m/%Y') as blogin from internet_account where 1=1 $where";
            $array['error'] = $sql;
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


ob_end_flush();?>