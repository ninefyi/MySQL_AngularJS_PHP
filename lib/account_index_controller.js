var accountApp = angular.module('accountApp', ['ui.bootstrap']);
accountApp.controller('accountCtrl', function($scope, $http){

    $scope.get_current_internet_account = function(){
        $http.get("index_action.php?op=get_current_internet_account")
            .success(function(data, status, headers, config) {
                $scope.internets = data.records;
            })
            .error(function(data, status, headers, config) {
                alert(data);
            });
    };

    $scope.logout = function(){
        $http.get("index_action.php?op=logout")
            .success(function(data, status, headers, config) {
                window.location = data;
            })
            .error(function(data, status, headers, config) {
                alert(data);
            });
    };

    $scope.history = function(){
        $http.get("index_action.php?op=history")
            .success(function(data, status, headers, config) {
                $scope.internets = data.records;
            })
            .error(function(data, status, headers, config) {
                alert(data);
            });
    };

    $scope.create_ticket = function(){
        if(confirm("คุณต้องการขอบัตรอินเตอร์เน็ตใหม่ใช่ไหม")) {
            $http.get("index_action.php?op=create")
                .success(function (data, status, headers, config) {
                    $scope.internets = data.records;
                })
                .error(function (data, status, headers, config) {
                    alert(data);
                });
        }
    };


});