var loginApp = angular.module('indexApp', ['ui.bootstrap']);
loginApp.controller('indexCtrl', function($scope, $http){
    $scope.formData = {};
    $scope.processForm = function(){

        $http({
            method  : 'POST',
            url     : 'index_action.php',
            data    : $.param($scope.formData) + '&op=check_login',  // pass in data as strings
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
        }).success(function(data) {
               window.location.href = data;
        }).error(function(data, status, headers, config) {
            alert(data);
        });

    };

});