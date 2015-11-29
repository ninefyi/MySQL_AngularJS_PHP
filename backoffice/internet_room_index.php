<?php ob_start();
    include_once("config.php");
?>
<!DOCTYPE html>
<html ng-app="internetApp" ng-controller="internetCtrl" lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../lib/bnc.css" rel="stylesheet">
    <title>BNC Residence</title>
    <script src="../lib/angular/angular.min.js"></script>
</head>
<body>
<form id="frm" name="frm">
    <div ng-include="'header.inc.php'"></div>
    <div id="internet_data" class="container">
        <table border="1" class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>ห้อง</th>
                <th>ประเภทของบัตร</th>
                <th>ชื่อผู้ใช้</th>
                <th>วันที่เริ่มใช้งาน</th>
                <th>ราคา</th>
                <th>สถานะการชำระเงิน</th>
                <th>การกระทำ</th>
            </tr>
            </thead>
            <tbody ng-init="get_internet_room()">
            <tr ng-repeat="data in internets" ng-class-even="'evenRow'" ng-class-odd="'oddEven'" ng-style="set_color(data.payment_status)">
                <td>{{data.roomno}}</td>
                <td>{{data.policy}}</td>
                <td>{{data.login}}</td>
                <td>{{data.date}}</td>
                <td>
                    <span ng-hide="editMode">{{data.price}}</span>
                    <input type="text" ng-show="editMode" size="10" ng-model="data.price" />
                </td>
                <td>
                    <span ng-hide="editMode">{{data.payment_text}}</span>
                    <input type="checkbox" ng-show="editMode" size="10" ng-model="data.payment_status"
                           ng-true-value="1" ng-false-value="0" />
                </td>
                <td>

                    <button ng-hide="editMode" ng-click="editMode=true;edit_internet_room(data)">แก้ไข</button>
                    <button ng-show="editMode" ng-click="editMode=false;update_internet_room(data)">บันทึก</button> |
                    <button ng-click="delete_internet_room()">ลบ</button>
                </td>
            </tr>
            <tr ng-if="internets.length == 0"><th colspan="7" style="text-align: center;background-color: #c0c0c0;">ไม่พบข้อมูล</th></tr>
            </tbody>
        </table>
    </div>
</form>
</body>
<script src="../lib/internet_controller.js"></script>
<script src="../lib/bootstrap/js/ui-bootstrap-tpls-0.13.0.min.js"></script>
</html>
<?php ob_end_flush();?>
