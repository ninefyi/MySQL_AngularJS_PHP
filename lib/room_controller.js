var roomApp = angular.module('roomApp', ['ui.bootstrap']);
roomApp.controller('roomCtrl', function($scope, $http){
    $scope.rooms = {};
    $scope.editing = false;
    $scope.get_room = function(){
        $http.get("room_action.php?op=load_room")
            .success(function(data, status, headers, config) {
                $scope.rooms = data.records;
            })
            .error(function(data, status, headers, config) {
                alert(data);
            });
    };

    $scope.update_room = function(room){
        var room_no = room.no;
        var room_password = room.password;
        $http.get("room_action.php?op=update_room&room_no=" + room_no + "&room_password=" + room_password)
            .success(function(data, status, headers, config) {
                $scope.get_room();
            })
            .error(function(data, status, headers, config) {
                alert(data);
            });
    };

    $scope.edit_room = function(index){
        $scope.editing = $scope.rooms.indexOf(index);

    };

    $scope.delete_room = function() {
        if (confirm('Are you sure to delete?')) {
        }
    };

});