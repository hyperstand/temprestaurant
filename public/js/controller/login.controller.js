ModuleDeclare.controller('loginController', ['$scope','$timeout',Controller]);

function Controller($scope,$timeout,$q,$http)
{   $scope.data={
    email:false,
    password:false,
    rememberme:false
    };

    $scope.emailregex='/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i'

    $scope.Login=function(){
        $scope.error_stat.email=true;
        $scope.error_stat.password=true;
        console.log($scope.error_stat.password.$dirty);
        console.log($scope.error_stat.rememberme);
        // $scope.result;  
        $('#Loginbody').submit();      
    }
    $scope.rememberme=function(){
        if($scope.error_stat.rememberme)
           {
            $scope.error_stat.rememberme=false;
           }else{
            $scope.error_stat.rememberme=true;
           }
    }
    // $scope.$watch('error_stat.rememberme', function(newValue, oldValue) {
    // },true);


    // function()
}