var loginApp = angular.module('loginApp', ['ui.bootstrap']);
loginApp.controller('loginCtrl', function($scope, $http, $window){
    $scope.formData = {};
    $scope.processForm = function(){

        $http({
            method  : 'POST',
            url     : 'login_action.php',
            data    : $.param($scope.formData) + '&op=check_login',  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
        }).success(function(data) {
            $window.location.href = '/bnc/account/index.php';
        }).error(function(data, status, headers, config) {
            alert(data);
        });

    };

});