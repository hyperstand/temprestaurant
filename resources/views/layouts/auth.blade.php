@extends('skeleton')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="css/nice-select.css">			
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/booking.css">
<link rel="stylesheet" href="css/loading.css">
@endsection



@section('component') 
<main ng-view></main>
@endsection


@section('javascript')
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular-messages.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.2/angular-route.min.js"></script>




<script src="js/easing.min.js"></script>			
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.min.js"></script>	
<script src="js/jquery.magnific-popup.min.js"></script>				
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script>
                // window.loadedDependencies = [];
                // window.loadedDependencies.push('ngRoute')
                // window.loadedDependencies.push('ngMessages')
</script>
<script src="js/app.js"></script>
<script>
  ModuleDeclare.run(function($rootScope){
    $rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
        $rootScope.title = current.$$route.title;
    });
  })
</script>
{{-- <script src="js/provider/ng-intl-tel-input.provider.js"></script>
<script src="js/directive/ng-intl-tel-input.directive.js"></script>
<script src="http://hodgepodgers.github.io/ng-intl-tel-input/bower_components/intl-tel-input/lib/libphonenumber/build/utils.js"></script>
<script src="http://hodgepodgers.github.io/ng-intl-tel-input/bower_components/intl-tel-input/build/js/intlTelInput.js"></script> --}}
<script src="js/controller/login.controller.js"></script>
<script src="js/controller/register.controller.js"></script>
<script src="js/directive/register.directive.js"></script>
<script>
                ModuleDeclare
                .constant("CSRF_TOKEN", '{{ csrf_token()}}') 
                .config(function ($routeProvider) {
                        $routeProvider
                          .when('/login', {
                            title: 'Login',
                            templateUrl: 'template/login.template.html',
                            controller: 'loginController'
                          })
                          .when('/register', {
                            title: 'Register',
                            templateUrl: 'template/register.template.html',
                            controller: 'registerController'
                          })
                          .otherwise({
                             redirectTo: '/login'
                          });
                          
                      });</script>
				


@endsection