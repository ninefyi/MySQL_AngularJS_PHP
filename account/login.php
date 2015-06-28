<?php ob_start();
?>
    <!DOCTYPE html>
    <html ng-app="loginApp" ng-controller="loginCtrl" lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <title>BNC Residence</title>
        <script src="../lib/jquery-2.1.4.min.js"></script>
        <script src="../lib/angular/angular.min.js"></script>
        <script>
        </script>
    </head>
    <body>
    <form id="frm" name="frm" ng-submit="processForm()" novalidate>
        <div id="login_data" class="container">
            <table border="1" class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>Login:</th>
                    <td><input type="text" id="txt_login" name="txt_login" class="form-control" placeholder="Enter your room no"
                               ng-model="formData.login" required/>
                        <span style="color:red" ng-show="frm.txt_login.$dirty && frm.txt_login.$invalid">
                            <span ng-show="frm.txt_login.$error.required">*required.</span>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Password:</th>
                    <td><input type="password" id="txt_pwd" name="txt_pwd" class="form-control" placeholder="Enter your password"
                               ng-model="formData.password" required/>
                        <span style="color:red" ng-show="frm.txt_pwd.$dirty && frm.txt_pwd.$invalid">
                            <span ng-show="frm.txt_pwd.$error.required">*required.</span>
                        </span>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                    <button type="submit" class="btn btn-success btn-lg btn-block"
                            ng-disabled="frm.txt_pwd.$dirty && frm.txt_pwd.$invalid
                                        || frm.txt_login.$dirty && frm.txt_login.$invalid
                                        || frm.txt_login.$pristine
                                        || frm.txt_pwd.$pristine">
                        Login!
                    </button>
                    </th>
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