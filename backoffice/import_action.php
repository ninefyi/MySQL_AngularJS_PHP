<?php ob_start();
    require_once "../lib/PHPExcel.php";
    require_once "config.php";


    if(isset($_FILES['file_upload'])){
        $file_name  = $_FILES['file_upload']['name'];
        $chk_ext = explode(".",$file_name);
        $file_name = $chk_ext[0].date("Ymd").".".$chk_ext[1];
        $file_path = "../csv/$file_name";
        if($chk_ext[1] == "csv"){
            $temp_name =  $_FILES['file_upload']['tmp_name'];
            if (move_uploaded_file($temp_name, $file_path)) {
                #echo "The file ". basename( $_FILES["file_upload"]["name"]). " has been uploaded.";
                readCSV($file_path);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }


        }


    }

    function readCSV($file_path){
        global $conn;
        $found_error = 0;
        $objReader = PHPExcel_IOFactory::createReader("CSV");
        $objPHPExcel = $objReader->load($file_path);
        $worksheet = $objPHPExcel->getActiveSheet();
        foreach ($worksheet->getRowIterator() as $row) {
            $rowIndex = $row->getRowIndex();
            if($rowIndex > 1) {
                $cell = $worksheet->getCell('B' . $rowIndex);
                $activate = $cell->getValue();
                $cell = $worksheet->getCell('C' . $rowIndex);
                $login = $cell->getValue();
                $cell = $worksheet->getCell('D' . $rowIndex);
                $password = $cell->getValue();
                $cell = $worksheet->getCell('E' . $rowIndex);
                $policy = $cell->getValue();
                $cell = $worksheet->getCell('J' . $rowIndex);
                $build = $cell->getValue();

                if($activate == "yes" and isNotExist($login, $password) === true){
                    echo "$login, $password, $build => ";
                    $sql = "INSERT INTO internet_account(internet_login, internet_password, internet_policy, build_date, activate) VALUES('$login', '$password', '$policy', '$build', 0)";
                    try {
                        $conn->exec($sql);
                        echo "OK";
                    } catch (Exception $ex) {
                        echo "Error!" . $sql;
                    }
                    echo '<hr/>';
                }else{
                    echo 'Error!';
                    $found_error = 1;
                }
            }
        }
        if($found_error == 1){
            echo '<script>alert("Found Error"); window.location.href="import.php";</script>';
        }else{
            echo '<script>alert("Import complete"); window.location.href="internet_account_index.php";</script>';
        }

    }

    function isNotExist($login, $password){
        global $conn;
        $sql = "SELECT COUNT(*) as cnt FROM internet_account WHERE internet_login='$login' AND internet_password='$password' ";
        $pass = false;
        try{
            if($stmt = $conn->query($sql)){
                $rs = $stmt->fetchAll();
                foreach($rs as $row){
                    if($row['cnt'] == 0)
                        $pass = true;
                }
            }

        }catch (Exception $ex){
            $pass = false;
        }
        return $pass;
    }


ob_end_flush();?>