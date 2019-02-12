@extends('skeleton')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
<link rel="stylesheet" href="css/linearicons.css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.css' rel='stylesheet' />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="css/nice-select.css">			
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/booking.css">
<link rel="stylesheet" href="css/loading.css">
@endsection



@section('component') 
{{-- <div class="auth Loginbody" ng-controller="loginController" >
        <div class="header">
                <img src="img/logo.png" alt="" title="" />
                <h3>Login</h3>
                <p><% result %></p>
        </div>
        <form method="POST" name="userForm" id="Loginbody" ng-submit="Login()">
                <div class="mt-20">
                        <input type="email" name="email" 
                        placeholder="Email address" required
                         class="single-input" ng-model="email">
                        <p class="notify"  ng-messages="userForm.email.$error" ng-pattern='/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i'  ng-show="userForm.$submitted ||userForm.email.$touched">
                           <span class="error" ng-message="pattern" >Email Not Valid</span> 
                           <span class="error" ng-message="required">Email Field Cannot Be Empty</span> 
                        </p>
                </div>
                <div class="mt-20">
                                <input type="password" name="password" 
                                placeholder="Password" 
                                required class="single-input" name="password" ng-model="password" >
                                <p class="notify" ng-messages="userForm.password.$error" ng-show="userForm.$submitted ||userForm.password.$touched">
                                   <span class="error" ng-message="required">Password Field Cannot Be Empty</span> 
                                </p>
                </div>

                <div class="mt-20">
                        <button href=""  class="genric-btn primary">Login</button>
                </div>
                <div class="footer">
                        <div class="remember">
                                <div class="custom-checkbox ">
                                        <input type="checkbox" id="confirm-checkbox" ng-model="error_stat.rememberme">
                                        <label for="confirm-checkbox"></label>
                                  </div>
                                <p class="remember-text" ng-click="rememberme()">
                                    Remember Me
                                </p> 
                        </div>
                        <a href="" class="retrive">Forget Password</a>
                </div>

                @include('component.spinner');
        </form>

        <div class="footer-2">
                <p>Don't Have An Account Sign Up <a href="{{url('register')}}">Here</a></p>
        </div>
    </div>  --}}

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
<script src="js/owl.carousel.min.js"></script>			
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script>
                //         window.loadedDependencies = [];
                // window.loadedDependencies.push()
                // window.loadedDependencies.push()
</script>
<script src="js/app.js"></script>
<script src="js/controller/login.controller.js"></script>
<script>
        

                ModuleDeclare
                .constant("CSRF_TOKEN", '{{ csrf_token()}}') 
                .config(function ($routeProvider) {
                        $routeProvider
                          .when('/login', {
                            templateUrl: 'template/login.template.html',
                            controller: 'loginController'
                          })
                          .when('/register', {
                            templateUrl: 'template/register.template.html',
                            controller: 'loginController'
                          })
                          .otherwise({
                             redirectTo: '/login'
                          });
                          
                      });</script>
				


@endsection