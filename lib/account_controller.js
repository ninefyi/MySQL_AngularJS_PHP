var accountApp = angular.module('accountApp', ['ui.bootstrap']);
accountApp.controller('accountCtrl', function($scope, $http){
    $scope.formData = {
        policy:'',
        activate:''
    };
    $scope.get_internet_account = function(){
        $http.get("internet_account_action.php?op=load_internet_account")
            .success(function(data, status, headers, config) {
                $scope.accounts = data.records;
            })
            .error(function(data, status, headers, config) {
                alert(data);
            });
    };

    $scope.update_internet_account = function(){

    };

    $scope.search_internet_account = function(formData){
        var policy = formData.policy;
        var activate = formData.activate;
        $http.get("internet_account_action.php?op=load_internet_account&policy=" + policy + "&activate=" + activate)
            .success(function(data, status, headers, config) {
                $scope.accounts = data.records;
            })
            .error(function(data, status, headers, config) {
                alert(data);
            });
    };

    $scope.delete_internet_account = function(data) {
        if (confirm('Are you sure to delete?')) {
            var internet_id = data.id;
            $http.get("internet_account_action.php?op=delete_internet_account&internet_id=" + internet_id)
                .success(function(data, status, headers, config) {
                    $scope.get_internet_account();
                })
                .error(function(data, status, headers, config) {
                    alert(data);
                });
        }
    };

});