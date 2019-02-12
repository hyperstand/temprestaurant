ModuleDeclare.controller('loginController', ['$scope','$timeout','$q','$http','CSRF_TOKEN',Controller]);

function Controller($scope,$timeout,$q,$http,CSRF_TOKEN)
{   $scope.data={
    email:'',
    password:'',
    rememberme:false
    };
    $scope.input_stat={
      email:{touched:false,error:0},
      password:{touched:false,error:0}
    }
    $scope.Load=false;
    $scope.emailregex=/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    $scope.Login=function()
    {
    console.log($scope.input_stat);
    $scope.userForm.email.$validate();
    $scope.userForm.password.$validate();
    if($scope.input_stat.email.error > 0  || $scope.input_stat.password.error > 0)
      {
        console.log('error');
      }
    else
    {
            $scope.Load=true;
      $http.post('http://localhost/project/restaurant_level/public/login',{crfs:CSRF_TOKEN,data:$scope.data}).then(function successCallback(response) {

        $scope.Load=false;
      }, function errorCallback(response) {
        $scope.Load=false;
      });
    }
    }

    $scope.interacted = function(field) {
      if(field.$name == "email")
      {
        $scope.input_stat.email.error=Object.keys(field.$error).length;
        $scope.input_stat.email.touched=field.$touched;
      }
      else if(field.$name == "password")
      {
        $scope.input_stat.password.touched=field.$touched;
        $scope.input_stat.password.error=Object.keys(field.$error).length;
      }
      return $scope.submitted || field.$dirty;
    };

    $scope.rememberme=()=>{($scope.data.rememberme)?($scope.data.rememberme=false):($scope.data.rememberme=true);};
  
    // $scope.$watch('error_stat.rememberme', function(newValue, oldValue) {
    // },true);


}