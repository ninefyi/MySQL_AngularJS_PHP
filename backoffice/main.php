<?php ob_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html ng-app="mainApp" ng-controller="mainCtrl" lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>BNC Residence - Wellcome Admin <?=$_SESSION['admin'];?></title>
    <script src="../lib/angular/angular.min.js"></script>
    <script src="../lib/jquery-2.1.4.min.js"></script>
    <script>
    </script>
</head>
<body>
<form id="frm" name="frm">
   <div ng-include="'header.inc.php'"></div>
</form>
</body>
<script src="../lib/backoffice_main_controller.js"></script>
<script src="../lib/bootstrap/js/ui-bootstrap-tpls-0.13.0.min.js"></script>
</html>
<?php ob_end_flush();?>
