<?php ob_start();
?>
<!DOCTYPE html>
<html ng-app="internetApp" ng-controller="internetCtrl" lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>BNC Residence</title>
    <script src="../lib/angular/angular.min.js"></script>
    <script>
    </script>
</head>
<body>
<form id="frm" name="frm">
    <div id="internet_data" class="container">
        <table border="1" class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>Room no.</th>
                <th>Login</th>
                <th>Active date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody ng-init="get_internet_room()">
            <tr ng-repeat="data in internets">
                <td>{{data.roomno}}</td>
                <td>{{data.login}}</td>
                <td>{{data.date}}</td>
                <td>
                    <button ng-click="update_internet_room()">Edit</button> | <button ng-click="delete_internet_room()">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</form>
</body>
<script src="../lib/internet_controller.js"></script>
<script src="../lib/bootstrap/js/ui-bootstrap-tpls-0.13.0.min.js"></script>
</html>
<?php ob_end_flush();?>