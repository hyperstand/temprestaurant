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
<link rel="stylesheet" href="http://eonasdan.github.io/bootstrap-datetimepicker/content/bootstrap-datetimepicker.css">
@endsection

@section('title','Dashboard') 

@section('component') 
@include('component.ifloginnav')


{{-- modal booking --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="max-width:400px;">
        <h4>Booking Request</h4>

            <form action="" class="booking-modal">
                        <div class="mt-10">
                        <p class="title">Date</p>
                        <div class="picker">
                            {{-- <p>Choose Your Date</p> --}}
                            <p>12 June 2012</p>
                            <a class="genric-btn primary">
                                    <i class="fas fa-calendar-alt"></i>
                            </a>
                        </div>

                        </div>
                        <div class="mt-10">
                                <p class="title">Time</p>
                                    <div class="picker">
                                        {{-- <p>08:00 AM</p> --}}
                                        <p>Pick Your Time</p>
                                        <a class="genric-btn primary">
                                                <i class="far fa-clock"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-10">
                                  <p class="title">Number Of People</p>
                                  <div class="product-adddel">
                                        <a class="genric-btn primary">
                                             <i class="fas fa-minus"></i>
                                        </a>
                                        <p class="tot-item">1 People</p>
                                        <a class="genric-btn primary">
                                             <i class="fas fa-plus"></i>
                                        </a>
                                  </div>
 

                                 {{-- <div class="input-numb-people">
                                     
                                 <p class="data">1 people</p>
                                 
                                 <div class="control-btn">
                                        <a class="genric-btn primary">
                                                <i class="fas fa-minus"></i>
                                           </a>
                                        <a class="genric-btn primary">
                                                <i class="fas fa-plus"></i>
                                           </a>
                                 </div>
                                </div> --}}


                                </div>

                        <a href="#" class="mt-20 genric-btn primary radius">
                            Finish Booking</a>
            </form>

      </div>
    </div>
  </div>



<section class="booking-body">
    <div class="container">
        <div class="row d-flex justify-content-center">     
            <div class="col-lg-3 col-md-10  col-sm-12" style="border:1px solid red;">
            <div class="user-info">
            <img src="https://yt3.ggpht.com/-FpoBOVwSiE0/AAAAAAAAAAI/AAAAAAAAAAA/Yf-SnwkfdQ4/s88-c-k-no-mo-rj-c0xffffff/photo.jpg" alt="">
            
            <section>
            <p class="name">MyClark Youser</p>

            <div class="info">
            <dl>
            <dt>Total Booking</dt>
            <dd>0</dd>
            </dl>

            <dl class="">
            <dt>Total Delivery</dt>
            <dd>0</dd>
            </dl>
            
            </div>
           
            
            </section>
            </div>
        </div>

            {{-- <div class=" col-md-6 col-sm-12">
                <div class="weather-datetime-body">
                <div class="temp">
                    <span class="large-temp">28°</span>
                    <span class="temp-label">C</span>
                </div>
                <section>

                </section>
                </div>
            </div> --}}

            <div class="col-lg-8 col-md-10">

             <div class="x-body">
                <h4>Booking</h4>
                
                {{-- No Booking --}}
                <div class="no-data-body">
                        <p>You Have No Booking</p>
                        <a href="#" class="genric-btn primary-border radius" data-toggle="modal" data-target="#exampleModal">Book A Table</a>                 
                </div>

                {{-- Booking --}}
                {{-- <form action="">
                        <div class="mt-10">
                        <p class="title">Date</p>
                        <input type="text" name="first_name" class="single-input">
                        </div>
                        <div class="mt-10">
                                <p class="title">Time</p>
                                <input type="text" name="first_name" class="single-input">
                                </div>
                                <div class="mt-10">
                                        <p class="title">Number Of People</p>
                                        <input type="text" name="first_name" class="single-input">
                                        </div>
                        <a href="#" class="mt-20 genric-btn primary radius">
                            Finish Booking</a>
                </form> --}}

                {{-- booking-info --}}
                {{-- <div class="body-info-book ">
                    <div class="row">
                 <div class="info-box col-md-6 col-sm-12 mb-10">
                     <p>Date</p>
                     <p>12 January 2019</p>
                 </div>   

                <div class="info-box col-md-6 col-sm-12 mb-10">
                  <p>Time</p>
                  <p>08:00 WIB</p>
                </div>  

                <div class="info-box col-md-6 col-sm-12 mb-10">
                    <p>Number of People</p>
                    <p>3 People</p>
                </div>  
                <div class="info-box col-md-6 col-sm-12 mb-15">
                        <p>Aditional Request</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum sint voluptatibus nesciunt est inventore, asperiores libero nam sequi iure a quas aut repudiandae numquam optio hic perspiciatis, vitae id culpa?</p>
                </div>  

                 
                <div class="option-box col-md-12">
                 <a href="#" class="genric-btn primary-border radius">Cancel Booking</a>
                 <a href="#" class="genric-btn primary-border radius">Edit Booking</a>
                </div>
            </div>
                </div> --}}
             </div>

             <div class="x-body">
                    <h4>Delivery</h4>

                    <div class="no-data-body">
                            <p>You Have No Delivery</p>
                            <a href="#" class="genric-btn primary-border radius">Request Delivery</a>                 
                    </div>

                    <div class="delivery-progress">

                    </div>
             </div>

                
       
            </div>




        
    </div>




  </section>


@endsection


@section('javascript')
<script src="js/vendor/jquery-2.2.4.min.js">
</script><script src="js/vendor/bootstrap.min.js"></script>	
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.jss"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.5/angular.min.js"></script>		
<script src="js/easing.min.js"></script>			
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.min.js"></script>	
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>	
<script src="js/owl.carousel.min.js"></script>			
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.nice-select.min.js"></script>			
<script src="js/parallax.min.js"></script>	
<script src="js/mail-script.js"></script>	
<script src="js/main.js"></script>	
<script src="js/app.js"></script>

@endsection