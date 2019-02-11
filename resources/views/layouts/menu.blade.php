@extends('skeleton')
@section('css')
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
<link rel="stylesheet" href="css/linearicons.css">
<script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>

<link rel="stylesheet" href="css/nice-select.css">			
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/booking.css">
<link rel="stylesheet" href="css/loading.css">
@endsection
@section('title','Our Menu')
@section('component')
@include('component.notloginnav')
<div class="modal fade" id="myModal" role="dialog"ng-controller="MenuController">
    <div class="order modal-dialog">
          <div class="modal-content" >
            <div class="row">
                <h2><%modal.name%></h2>
            <div class="info-one col-md-6 col-sm-12">
            
            <img class="img-fluid" ng-src="<%modal.img%>" 
            alt="">
            <h4 class="pt-10 ">Nutrition Info</h4>
            <ul class="nu-list">
                <li>
                    <p class="title">Calories</p>
                    <p class="data"><%modal.calories%></p>
                </li>
                <li>
                    <p class="title">Total Fat</p>
                    <p class="data"><%modal.fat%></p> 
                </li>
            </ul>

            </div>
            <div class="info-two col-md-6 col-sm-12">
                <p><%modal.desc%></p>
            </div>
        
        </div>
        </div>
          
        </div>
</div>


			<!-- Start banner Area -->
			<section class="generic-banner relative">
                    <img class="our-menu-back" src="http://bit.ly/1KnDNGG" alt="">						
                    <div class="container">
                        <div class="row height align-items-center justify-content-center">
                            <div class="col-lg-10">
                                <div class="generic-banner-content" style="float:left;">
                                    <h2 class="text-white" style="text-align:left;">Our Menu</h2>
                                    <p class="text-white" style="text-align:left;">Life at home gives absolute joy. There are some days when, as soon as you've finished cooking breakfast and cleaning up the kitchen, it's time to start lunch, and by the time you've done that, you're doing dinner and thinking, 'There has to be a menu we can order from.'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>		
                <!-- End banner Area -->
            
            <!-- Start top-dish Area -->
            <section class="top-dish-area search-area" ng-controller="MenuController">
                <div class="container">
                        
                    <div class="row d-flex justify-content-center">
                        <form class="menu-content pb-30 col-lg-8" ng-submit="SearchFood()">
                            <h3 class="Search-title">Search Here</h3>
                                    <p class="title text-center Search-Food">
                                            <input ng-disabled="stat.Load == true" name="fname" ng-model="stat.searchfield" class="common-input" ng-class="{'disable':stat.Load}" required="" type="text">
                                            <a href="" class="filter-btn" ng-click="ToggleFilter()">
                                                <i class="fas fa-sliders-h" ng-class="{'disable':stat.Load}"></i>
                                            </a>
                                            <a href="" class="genric-btn" ng-class="stat.Load ? 'disable radius' : 'primary radius'" ng-click="SearchFood()">Search</a>
                                    </p>
                                    
                                    <filter-box source="FilterList" ng-hide="stat.Load == true" id="hyde"></filter-box>
                            </form>
                    </div>	
            <food-showcase source="FoodData" ng-hide="stat.Load == true || stat.notfound == true"></food-showcase>
            
           
               
            <div class="text-xs-center notfound" ng-hide="stat.notfound == false">
                    <img src="img/not-found.png" alt="" >
                    <p  style="margin:0;margin-top:.5em;">
                        Food Not Found</p>
            </div>    

            <div class="text-xs-center "ng-hide="stat.Load == true || stat.notfound == true">
                        <ul class="pagination">
                                    <li><a href="JavaScript:Void(0)"ng-click="changepage('prev')" class="genric-btn primary circle pgn-left"><i class="fas fa-angle-left"></i></a></li>
                                    <li ng-repeat="page in [].constructor(stat.paginationSize) track by $index" >
                                        <a href="JavaScript:Void(0)" ng-click="changepage($index)" ng-class="{'selected':$index == stat.pagelocation }"><% $index+1%></a></li>
                                    <li> <a href="JavaScript:Void(0)" ng-click="changepage('next')"  class="genric-btn primary circle pgn-right"><i class="fas fa-angle-right"></i></a></li> 
                        </ul>
            </div>
     
                </div>
            </section>
           
            
            <div class="Loading-content" ng-controller="MenuController">
	            @include('component.spinner')
             </div>

       
            <!-- End top-dish Area -->	


@include('component.footer')
@endsection












@section('javascript')
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="js/vendor/popper.1.12.9.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>	
<script src="js/vendor/angularjs-1.7.5.min.js"></script>		
<script src="js/easing.min.js"></script>			
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.min.js"></script>	
<script src="js/jquery.magnific-popup.min.js"></script>	
<script src="js/owl.carousel.min.js"></script>			
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.nice-select.min.js"></script>			
<script src="js/app.js"></script>
{{-- custom directive--}}
<script src="js/directive/search.directive.js"></script>
{{-- custom controller --}}
<script src="js/controller/menu.notlogin.controller.js"></script>
{{-- custom factory --}}
<script src="js/factory/getfood.factory.js"></script>
@endsection