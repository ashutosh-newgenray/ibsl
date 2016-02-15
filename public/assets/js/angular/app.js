var myApp = angular.module('myApp',['ui.bootstrap']);

/*
 * Main Controller
 */
myApp.controller('mainCtrl', ['$scope','$http', function($scope,$http) {

}]);



/*
* Permission Controller
* @menu  Admin > update menu permission
* @file menu-permissions.blade.php
*/
myApp.controller('UserCtrl', ['$scope','$http', function($scope,$http) {
    $scope.user = [];
    $scope.userToken = "";
    $scope.errors = [];
    $scope.message = "";


    $scope.updateUserPassword = function(url,id){
        $http.post(url,{
                id : id,
                password : $scope.user[id].password
        }).then(function(res){
            if(res.data.status == 'error'){
                $scope.errors = res.data.message.password;
            }
            else{
                $scope.user[id].password = "";
                $scope.message = res.data.message;
            }
            });
    }
}]);

