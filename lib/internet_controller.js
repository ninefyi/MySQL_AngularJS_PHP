var internetApp = angular.module('internetApp', ['ui.bootstrap']);
internetApp.controller('internetCtrl', function($scope, $http){
    $scope.formData = {};
    $scope.internets = {};
    $scope.editing = false;
    $scope.get_internet_room = function(){
        $http.get("internet_room_action.php?op=load_internet_room")
            .success(function(data, status, headers, config) {
                $scope.internets = data.records;
            })
            .error(function(data, status, headers, config) {
                alert(data);
            });
    };

    $scope.delete_internet_room = function() {
        if (confirm('Are you sure to delete?')) {
        }
    };

    $scope.edit_internet_room = function(index){
        $scope.editing = $scope.internets.indexOf(index);
    }

    $scope.update_internet_room = function(internet){
        $http.post("internet_room_action.php?op=update_internet_room&id=" + internet.id
                + '&payment=' + internet.payment_status + '&price=' + internet.price )
            .success(function(data, status, headers, config) {
                $scope.internets = data.records;
            })
            .error(function(data, status, headers, config) {
                alert(data);
            });
    }

});