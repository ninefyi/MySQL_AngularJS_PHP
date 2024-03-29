var internetApp = angular.module('nopayApp', ['ui.bootstrap']);
internetApp.controller('nopayCtrl', function($scope, $http){
    $scope.formData = {};
    $scope.internets = {};
    $scope.editing = false;
    $scope.get_internet_room = function(){
        $http.get("internet_nopay_action.php?op=load_internet_room")
            .success(function(data, status, headers, config) {
                $scope.internets = data.records;
            })
            .error(function(data, status, headers, config) {
                alert(data);
            });
    };

    $scope.delete_internet_room = function(internet) {
        if (confirm('Are you sure to delete?')) {
            $http.get("internet_nopay_action.php?op=delete_internet_room&id=" + internet.id + "&login=" + internet.login)
                .success(function(data, status, headers, config) {
                    $scope.get_internet_room();
                })
                .error(function(data, status, headers, config) {
                    alert(data);
                });
        }
    };

    $scope.edit_internet_room = function(index){
        $scope.editing = $scope.internets.indexOf(index);
    }

    $scope.update_internet_room = function(internet){
        $http.post("internet_nopay_action.php?op=update_internet_room&id=" + internet.id
                + '&payment=' + internet.payment_status + '&price=' + internet.price )
            .success(function(data, status, headers, config) {
                $scope.get_internet_room();
            })
            .error(function(data, status, headers, config) {
                alert(data);
            });
    }

    $scope.set_color = function (status) {
        if (status == 0) {
            return { backgroundColor: "yellow" }
        }
    }

});