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

<div class="auth Registerbody" >
        <div class="header">
                <img src="img/logo.png" alt="" title="" />
                <h3>Register</h3>
        </div>
        <form action="" class="row">
        
        <div class="mt-20 col-md-6">
          
          <input type="text" name="firstname" 
          placeholder="Firstname"  
          required="" 
          class="single-input">
          <p class="notify">
                 <span class="success">Username Required</span> 
          </p>
        </div>
        
        <div class="mt-20 col-md-6">
          <input type="text" name="lastname" 
          placeholder="Lastname" 
          required="" class="single-input">
          <p class="notify">
                        <span class="error">Username Required</span> 
          </p>
        </div>
    
        <div class="mt-20 col-md-12">
          <input type="email" name="email" 
          placeholder="Email" required="" 
          class="single-input">
          <p class="notify">
                        <span class="error">Username Required</span> 
          </p>
        </div>
    
        <div class="mt-20 col-md-6">
          <input type="password" 
          name="Password" placeholder="Password" 
          required="" class="single-input">
          <p class="notify">
                        <span class="error">Username Required</span> 
          </p>
        </div>
        <div class="mt-20 col-md-6">
                        <input type="password" 
                        name="Password" placeholder="Repeat Password" 
                        required="" class="single-input">
                        <p class="notify">
                                      <span class="error">Username Required</span> 
                        </p>
        </div>
    
        <div class="mt-20 col-md-12">
                <div class="agree">
                  <div class="custom-checkbox missing">
                        <input type="checkbox" id="confirm-checkbox">
                        <label for="confirm-checkbox"></label>
                  </div>
                  <p class="confirm-text">
                     By clicking this checkbox you accept the <a href="#">terms and conditions</a>
                     of this website
                  </p> 
                </div>
        </div>
    
        <div class="mt-20 col-md-12">
                        <a href="#" class="genric-btn primary">Register</a>
        </div>
        <div class="footer col-md-12">
                <p class="retrive">Login <a href="{{url('login')}}">Here</a> If You Have Account</p> 
        </div>
        </form>
    
    
    </div> 

@endsection


@section('javascript')
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular.min.js"></script>		
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular-messages.js"></script>		
<script src="js/easing.min.js"></script>			
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.min.js"></script>	
<script src="js/jquery.magnific-popup.min.js"></script>	
<script src="js/owl.carousel.min.js"></script>			
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.nice-select.min.js"></script>				
<script src="js/app.js"></script>
<script src="js/controller/register.controller.js"></script>
@endsection