var mainApp = angular.module('mainApp', ['ui.bootstrap']);
mainApp.controller('mainCtrl', function($scope, $http){
    $scope.formData = {};

    $scope.linkRoomPage = function(){
        window.location = 'room_index.php';

    };

    $scope.linkInternetAccountPage = function(){
        window.location = 'internet_account_index.php';
    };

    $scope.linkInternetRoomPage = function(){
        window.location = 'internet_room_index.php';
    };

    $scope.logout =function(){
        window.location = 'logout.php';
    };
});