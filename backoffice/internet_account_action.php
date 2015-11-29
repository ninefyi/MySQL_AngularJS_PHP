<?php ob_start();

    require_once "config.php";

    $op = $_REQUEST['op'];

    if($op == "load_internet_account"){
        load_internet_account();
    }


    function load_internet_account(){
        global $conn;
        $array['records'] = array();
        try{
            $where = "";
            if(!empty($_GET['policy'])){
                $where .= " AND internet_policy='{$_GET[policy]}'";
            }
            if(!empty($_GET['activate'])){
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