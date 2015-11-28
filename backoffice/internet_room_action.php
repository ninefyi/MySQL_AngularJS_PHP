<?php ob_start();

    require_once "config.php";

    $op = $_REQUEST['op'];

    if($op == "load_internet_room"){
        load_internet_room();
    }else if($op == "save_internet_room"){

    }else if($op == "update_internet_room"){
        update_internet_room();
    }else if($op == "delete_internet_room"){

    }

    function update_internet_room(){
        global $conn;
        $array['records'] = array();
        try{
            $sql = "update internet_room set payment_status = ?, internet_price = ? where internet_room_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $_REQUEST['payment'], PDO::PARAM_INT);
            $stmt->bindParam(2, $_REQUEST['price'], PDO::PARAM_INT);
            $stmt->bindParam(3, $_REQUEST['id'], PDO::PARAM_INT);
            $stmt->execute();
            //echo json_encode($_REQUEST);
        }catch (Exception $ex) {
            $array['error'] = $ex->getMessage();
            echo json_encode($array);
        }

        load_internet_room();
    }

    function load_internet_room($internet_no = ""){
        global $conn;
        $array['records'] = array();
        try{
            $where = "";
            if(!empty($id)){
                $where = " internet_room_id = '$internet_no' ";
            }
            $sql = "select internet_room.*
                      , DATE_FORMAT(activate_date,'%d/%m/%Y') as blogin
                      , payment_status
                      , internet_account.internet_policy
                    from internet_room
                    inner join internet_account on internet_room.internet_login = internet_account.internet_login
                    where 1=1";
            $stmt = $conn->query($sql);
            $rs = $stmt->fetchAll();
            foreach($rs as $row){
                $payment_text = "No";
                $payment_status = 0;
                if($row['payment_status'] == 1){
                    $payment_text = "Yes";
                    $payment_status = 1;
                }
                $array['records'][] = array(
                    "id" => $row['internet_room_id'],
                    "login" => $row['internet_login'],
                    "roomno" => $row['room_no'],
                    "date" => $row['blogin'],
                    "payment_status" => $payment_status,
                    "payment_text" => $payment_text,
                    "policy" => $row['internet_policy'],
                    "price" => $row['internet_price']
                , );
            }
        }catch (Exception $ex){
            $array['error'] = $ex->getMessage();
        }
        echo json_encode($array);
    }

    function save_room(){

    }

    function delete_room(){

    }

ob_end_flush();?>