<?php ob_start();
    include_once("config.php");
?>
<!DOCTYPE html>
<html ng-app="roomApp" ng-controller="roomCtrl" lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../lib/bnc.css" rel="stylesheet">
    <title>BNC Residence</title>
    <script src="../lib/angular/angular.min.js"></script>
    <script>
    </script>
</head>
<body>
<form id="frm" name="frm">
    <div ng-include="'header.inc.php'"></div>
    <div id="room_data" class="container">
        <table border="1" class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>ห้อง</th>
                <th>รหัสผ่าน</th>
                <th>วันที่เข้าใช้งานล่าสุด</th>
                <th>การกระทำ</th>
            </tr>
            </thead>
            <tbody ng-init="get_room()">
            <tr>
                <td><input type="text" ng-model="data.no"/></td>
                <td>
                    <input type="text" ng-model="data.password" />
                </td>
                <td>&nbsp;</td>
                <td>
                    <button ng-click="create_room(data)">Create</button>
                </td>
            </tr>
            <tr ng-repeat="data in rooms" ng-class-even="'evenRow'" ng-class-odd="'oddEven'">
                <td>{{data.no}}</td>
                <td>
                    <span ng-hide="editMode">{{data.password}}</span>
                    <input type="text" ng-show="editMode" ng-model="data.password" />
                </td>
                <td>{{data.date}}</td>
                <td>
                    <button ng-hide="editMode" ng-click="editMode=true;edit_room(data)">Edit</button>
                    <button ng-show="editMode" ng-click="editMode=false;update_room(data)">Save</button>
                    | <button ng-click="delete_room(data)">Delete</button>
                </td>
            </tr>
            <tr ng-if="rooms.length == 0"><th colspan="4" style="text-align: center;background-color: #c0c0c0;">ไม่พบข้อมูล</th></tr>
            </tbody>
        </table>
    </div>
</form>
<div ng-show="loader.loading">กรุณารอสักครู่...</div>
</body>
<script src="../lib/room_controller.js"></script>
<script src="../lib/bootstrap/js/ui-bootstrap-tpls-0.13.0.min.js"></script>
</html>
<?php ob_end_flush();?>