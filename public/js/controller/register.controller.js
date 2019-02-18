ModuleDeclare.controller('registerController', ['$scope','$timeout','$q','$http','CSRF_TOKEN',Controller]);

function Controller($scope,$timeout,$q,$http,CSRF_TOKEN)
{   
    
    $scope.data={
    fname:"",
    lname:"",
    email:"",
    phnnumber:"",
    password_confirm:"",
    password:"",
    accepted:false,
    };

    $scope.input_stat={
      email:{touched:false,error:0},
      fname:{touched:false,error:0},
      lname:{touched:false,error:0},
      // phnnumber:{touched:false,error:0},
      password:{touched:false,error:0},
      password_confirm:{touched:false,error:0},
      accepted:{touched:false,error:0}
    }


    $scope.emailregex=/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    $scope.register=function()
    {
      $scope.submitted=true;
      if($scope.input_stat.email.error > 0 || $scope.input_stat.password_confirm.error > 0 || $scope.input_stat.password.error > 0 || $scope.input_stat.fname.error > 0|| $scope.input_stat.lname.error > 0)
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

    $scope.accept=()=>{($scope.data.accepted)?($scope.data.accepted=false):($scope.data.accepted=true);};
  
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
      else if(field.$name == "password_confirm")
      {
        $scope.input_stat.password_confirm.touched=field.$touched;
        $scope.input_stat.password_confirm.error=Object.keys(field.$error).length;
      }
      else if(field.$name == "fname")
      {
        $scope.input_stat.fname.touched=field.$touched;
        $scope.input_stat.fname.error=Object.keys(field.$error).length;
      }
      else if(field.$name == "lname")
      {
        $scope.input_stat.lname.touched=field.$touched;
        $scope.input_stat.lname.error=Object.keys(field.$error).length;
      }
      return $scope.submitted || field.$dirty;
    };

   
  
    // $scope.$watch('error_stat.rememberme', function(newValue, oldValue) {
    // },true);


}