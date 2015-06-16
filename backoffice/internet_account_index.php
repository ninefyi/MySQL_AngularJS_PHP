<?php ob_start();
?>
<!DOCTYPE html>
<html ng-app="accountApp" ng-controller="accountCtrl" lang="en">
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
    <div id="account_data" class="container">
        <table border="1" class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>Login</th>
                <th>Password</th>
                <th>Policy</th>
                <th>Build date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody ng-init="get_internet_account()">
            <tr ng-repeat="data in accounts">
                <td>{{data.login}}</td>
                <td>{{data.password}}</td>
                <td>{{data.policy}}</td>
                <td>{{data.date}}</td>
                <td>
                    <button ng-click="update_internet_account()">Edit</button> | <button ng-click="delete_internet_account()">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</form>
</body>
<script src="../lib/account_controller.js"></script>
<script src="../lib/bootstrap/js/ui-bootstrap-tpls-0.13.0.min.js"></script>
</html>
<?php ob_end_flush();?>