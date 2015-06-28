<?php ob_start();
?>
<!DOCTYPE html>
<html ng-app="importApp" ng-controller="importCtrl" lang="en">
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
</form>
</body>
<script src="../lib/backoffice_import_controller.js"></script>
<script src="../lib/bootstrap/js/ui-bootstrap-tpls-0.13.0.min.js"></script>
</html>
<?php ob_end_flush();?>