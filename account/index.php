<?php ob_start();
    session_start();
    include_once("config.php");
?>
<!DOCTYPE html>
<html ng-app="accountApp" ng-controller="accountCtrl" lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>BNC Residence - Wellcome Room <?=$_SESSION['room_no']?></title>
    <script src="../lib/angular/angular.min.js"></script>
    <script src="../lib/jquery-2.1.4.min.js"></script>
    <script>
    </script>
</head>
<body>
<form id="frm" name="frm">
<p><button id="btn_logout" name="btn_Logout" ng-click="logout()">ออกจากระบบ</button></p>
<p><button id="btn_history" name="btn_history" ng-click="get_current_internet_account()">ดูบัตรอินเตอร์เน็ตล่าสุดที่ใช้</button></p>
<p><button id="btn_history" name="btn_history" ng-click="history()">ดูประวัติการบัตรซื้ออินเตอร์เน็ต</button></p>
<p>
    <button id="btn_create" name="btn_create" ng-click="create_ticket()">ขอบัตรอินเตอร์นเน็ตใหม่</button>
    <?php
        foreach($GLOBALS['TICKET'] as $key => $value){
            echo '&nbsp;<input type="radio" name="policy" id="policy" value="'.$key
                .'" ng-model="formData.policy"/>&nbsp;'.$key.' วัน - '.$value.' บาท';
        }
    ?>
</p><hr/>
    <div id="internet_data" class="container">
        <table border="1" class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>ประเภทของบัตร</th>
                <th>ชื่อผู้ใช้</th>
                <th>รหัสผ่าน</th>
                <th>ราคา</th>
                <th>วันที่เริ่มใช้งาน</th>
                <th>วันหมดอายุ</th>
                <th>สถานะการชำระเงิน</th>
            </tr>
            </thead>
            <tbody ng-init="get_current_internet_account()">
            <tr ng-repeat="data in internets" ng-style="set_color(data.payment_status)">
                <td>{{data.policy}}</td>
                <td>{{data.login}}</td>
                <td>{{data.password}}</td>
                <td>{{data.price}}</td>
                <td>{{data.date}}</td>
                <td>{{data.expire}}</td>
                <td>{{data.payment_text}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</form>
</body>
<script src="../lib/account_index_controller.js"></script>
<script src="../lib/bootstrap/js/ui-bootstrap-tpls-0.13.0.min.js"></script>
</html>
<?php ob_end_flush();?>
