<?php ob_start();
?>
    <!DOCTYPE html>
    <html ng-app="roomApp" ng-controller="roomCtrl" lang="en">
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
        <div id="room_data" class="container">
            <table border="1" class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>Login:</th>
                    <td><input type="text" id="txt_login" name="txt_login"/></td>
                </tr>
                <tr>
                    <th>Password:</th>
                    <td><input type="password" id="txt_pwd" name="txt_pwd"/></td>
                </tr>
                </thead>
            </table>
        </div>
    </form>
    </body>
    <script src="../lib/login_controller.js"></script>
    <script src="../lib/bootstrap/js/ui-bootstrap-tpls-0.13.0.min.js"></script>
    </html>
<?php ob_end_flush();?>