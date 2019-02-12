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
@endsection
@section('title','Restaurant')
@section('component') 
@include('component.notloginnav')


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
                    <div class="container">
                        <div class="row fullscreen d-flex align-items-center justify-content-start">
                            <div class="banner-content col-lg-8 col-md-12">
                                <h4 class="text-white text-uppercase">Wide Options of Choice</h4>
                                <h1>
                                    Delicious Food					
                                </h1>
                                <p class="text-white">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp <br> or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
                                </p>
                                <a href="#" class="primary-btn header-btn text-uppercase">Book A Table</a>
                            </div>												
                        </div>
                    </div>
                </section>
                <!-- End banner Area -->	


<section class="top-dish-area section-gap" id="dish">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">About Us</h1>
                        <p>A Brief History About Our Restaurant</p>

                    </div>
                </div>
            </div>						
            <div class="content-about ">

                <p>
                                
                            Restaurant Mangia <strong>is one of the oldest American restaurant in Central Jakarta</strong>, which offers american specialties food which you can enjoyed in the pleasant air conditioned ambience.
                </p>
                    <p>
                           The Mangia restaurant reflects the history of the United States, blending the culinary contributions of various groups of people from around the world, including indigenous American Indians, African Americans, Asians, Europeans, Pacific Islanders, and South Americans.</p>					
                        <p>We provide fast delivery to your location and Easy Booking from our Website</p>
                        </div>
        </div>	

    </section>

			<!-- Start video Area -->
			<section class="video-area">
                    <div class="container">
                        <div class="row justify-content-center align-items-center flex-column">
                            <h3 class="pt-20 pb-20 text-white">We Always serve the vaping hot and delicious foods</h3>
                            <p class="text-white">We serve only the best</p>
                        </div>
                    </div>	
                </section>
                <!-- End video Area -->
    
                <!-- Start features Area -->
                <section class="features-area pt-100" id="feature">
                    <div class="container">
                        <div class="feature-section">
                            <div class="row">
                                <div class="single-feature col-lg-3 col-md-6">
                                    <img src="img/fast-food.png" alt="">
                                    <h4 class="pt-20 pb-20">Authentic American</h4>
                                    <p>
                                        Lorem ipsum dolor sit ametcons ecteturadipis icing elit.
                                    </p>
                                </div>
                                <div class="single-feature col-lg-3 col-md-6">
                                    <img src="img/meal-1.png" alt="">
                                    <h4 class="pt-20 pb-20">Fast Delivery</h4>
                                    <p>
                                        Lorem ipsum dolor sit ametcons ecteturadipis icing elit.
                                    </p>
                                </div>
                                <div class="single-feature col-lg-3 col-md-6">
                                    <img src="img/reserved.png" alt="">
                                    <h4 class="pt-20 pb-20">Easy Booking</h4>
                                    <p>
                                        Lorem ipsum dolor sit ametcons ecteturadipis icing elit.
                                    </p>
                                </div>
                                <div class="single-feature col-lg-3 col-md-6">
                                    <img src="img/f4.png" alt="">
                                    <h4 class="pt-20 pb-20">Rich Quality Food</h4>
                                    <p>
                                        Lorem ipsum dolor sit ametcons ecteturadipis icing elit.
                                    </p>
                                </div>														
                            </div>											
                        </div>


                    </div>	
                </section>
                <!-- End features Area -->
    
    
                <!-- Start related Area -->
                <section class="related-area section-gap">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="menu-content pb-60 col-lg-8">
                                <div class="title text-center">
                                    <h1 class="mb-10">Our Featured Food Menus</h1>
                                    <p>Who are in extremely love with eco friendly system.</p>
                                </div>
                            </div>
                        </div>						
                        <div class="row justify-content-center">
                            
                             <owl-carousel class="active-realated-carusel">
                                        <div owl-carousel-item="" ng-repeat="item in food_list" class="item row align-items-center">
                                             <div class="col-lg-6 rel-left"> <h3> <%item.food_name%> </h3> <p class="pt-30 pb-30"> <% item.food_desc%> </p> <a ng-href="<% item.link%>" class="primary-btn header-btn text-uppercase">view full menu</a> </div> <div class="col-lg-6"> <img class="img-fluid" ng-src="<% item.img_url%>" alt=""> </div> 
                                        </div>
                             </owl-carousel>
                        </div>
                    </div>	
                </section>
                <!-- End related Area -->


			<!-- Start Contact Area -->
			<section class="contact-area" id="contact">
                    <div class="container-fluid">
                        <div class="row align-items-center d-flex justify-content-start" >
                            <div class="col-lg-6 col-md-12 contact-left no-padding">
                                  <div class="map-content" id="map"></div>
                            </div>
    
                            <div class=" col-lg-4 col-md-12 pt-100 pb-100">	
                                <h1 class="contact-info form-area">Give Us Your Feedback</h1>
                                <form class="form-area" id="myForm" action="mail.php" method="post" class="contact-form text-right">
                                    <input name="fname" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mt-10" required="" type="text">
                                    <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mt-10" required="" type="email">
                                    <textarea class="common-textarea mt-10" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                    <button class="primary-btn mt-20">Send Message<span class="fas fa-arrow-right"></span></button>
                                    <div class="mt-10 alert-msg">
                                    </div>
                                </form>
    
                            </div>
    
                        </div>
                    </div>
                </section>
                <!-- End Contact Area -->		


@include('component.footer')
@endsection









@section('javascript')
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>	
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.js'></script>
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
<script src="js/app.js"></script>
<script src="js/directive/index.directive.js"></script>
@endsection