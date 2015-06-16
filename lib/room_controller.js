var roomApp = angular.module('roomApp', ['ui.bootstrap']);
roomApp.controller('roomCtrl', function($scope, $http){

    $scope.get_room = function(){
        $http.get("room_action.php?op=load_room")
            .success(function(data, status, headers, config) {
                $scope.rooms = data.records;
            })
            .error(function(data, status, headers, config) {
                alert(data);
            });
    };

    $scope.update_room = function(){

    };

    $scope.delete_room = function() {
        if (confirm('Are you sure to delete?')) {
        }
    };

});