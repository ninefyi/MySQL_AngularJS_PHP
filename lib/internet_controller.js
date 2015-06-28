var internetApp = angular.module('internetApp', ['ui.bootstrap']);
internetApp.controller('internetCtrl', function($scope, $http){
    $scope.formData = {};
    $scope.get_internet_room = function(){
        $http.get("internet_room_action.php?op=load_internet_room")
            .success(function(data, status, headers, config) {
                $scope.internets = data.records;
            })
            .error(function(data, status, headers, config) {
                alert(data);
            });
    };

    $scope.update_internet_room = function(){

    };

    $scope.delete_internet_room = function() {
        if (confirm('Are you sure to delete?')) {
        }
    };

});