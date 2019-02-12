ModuleDeclare.controller('loginController', ['$scope','$timeout','$q','$http','CSRF_TOKEN',Controller]);

function Controller($scope,$timeout,$q,$http,CSRF_TOKEN)
{   $scope.data={
    email:'',
    password:'',
    rememberme:false
    };
    $scope.Load=false;
    $scope.emailregex=/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    $scope.Login=function(){
      $scope.Load=true;
      $http.post('http://localhost/project/restaurant_level/public/login',{crfs:CSRF_TOKEN,data:$scope.data}).then(function successCallback(response) {

        $scope.Load=true;
      }, function errorCallback(response) {
        $scope.Load=true;
      });

    }
    $scope.rememberme=()=>{($scope.data.rememberme)?($scope.data.rememberme=false):($scope.data.rememberme=true);};
  
    // $scope.$watch('error_stat.rememberme', function(newValue, oldValue) {
    // },true);


}