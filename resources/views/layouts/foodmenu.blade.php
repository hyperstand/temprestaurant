@extends('skeleton')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.css' rel='stylesheet' />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
{{ Html::style('css/linearicons.css') }}
{{ Html::style('css/owl.carousel.css') }}
{{ Html::style('css/font-awesome.min.css') }}	
{{ Html::style('css/nice-select.css') }}		
{{ Html::style('css/magnific-popup.css') }}
{{ Html::style('css/bootstrap.css') }}
{{ Html::style('css/main.css') }}
{{ Html::style('css/booking.css') }}
{{ Html::style('css/loading.css') }}
@endsection
@section('title','Menu')
@section('component') 
@include('component.ifloginnav')
<section class="booking-body">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-12">
                
              <article class="test-search-menu">
                <h3>Search Here</h3>
                <div class="input-box">
                <input type="text">
                    <a href="#" class="genric-btn primary finish-order radius">
                    Search
                    </a>
                </div>
                
              </article>
    
                <div class="row select-content">
                    <div class="col-md-3 filter-menu" >
                         <!-- type -->
                         <div class="filter-content col-sm-12 col-md-12">
                                <h4>Type</h4>
                                <ul>
                                    <li class="d-flex justify-content-between">
                                                <p class="title-checkbox">Non-Vegeterian</p>
                                                <div class="primary-checkbox">
                                                    <input type="checkbox" id="nvg-checkbox">
                                                    <label for="nvg-checkbox"></label>
                                                </div>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <p class="title-checkbox">Vegeterian</p>
                                        <div class="primary-checkbox">
                                            <input type="checkbox" id="vg-checkbox">
                                            <label for="vg-checkbox"></label>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                            <p class="title-checkbox">Drink</p>
                                            <div class="primary-checkbox">
                                                <input type="checkbox" id="drink-checkbox">
                                                <label for="drink-checkbox"></label>
                                            </div>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                            <p class="title-checkbox">Dessert</p>
                                            <div class="primary-checkbox">
                                                <input type="checkbox" id="desrt-checkbox">
                                                <label for="desrt-checkbox"></label>
                                            </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- type -->
                            

                            <!-- if Dish -->
                            <div class="filter-content col-sm-12 col-md-12">
                                <h4>Type Of Food</h4>
                                <ul>
                                    <li class="d-flex justify-content-between">
                                                <p class="title-checkbox">Non-Vegeterian</p>
                                                <div class="primary-checkbox">
                                                    <input type="checkbox" id="nvg-checkbox">
                                                    <label for="nvg-checkbox"></label>
                                                </div>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <p class="title-checkbox">Vegeterian</p>
                                        <div class="primary-checkbox">
                                            <input type="checkbox" id="vg-checkbox">
                                            <label for="vg-checkbox"></label>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                            <p class="title-checkbox">Drink</p>
                                            <div class="primary-checkbox">
                                                <input type="checkbox" id="drink-checkbox">
                                                <label for="drink-checkbox"></label>
                                            </div>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                            <p class="title-checkbox">Dessert</p>
                                            <div class="primary-checkbox">
                                                <input type="checkbox" id="desrt-checkbox">
                                                <label for="desrt-checkbox"></label>
                                            </div>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <p class="title-checkbox">Dessert</p>
                                        <div class="primary-checkbox">
                                            <input type="checkbox" id="desrt-checkbox">
                                            <label for="desrt-checkbox"></label>
                                        </div>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <p class="title-checkbox">Dessert</p>
                                    <div class="primary-checkbox">
                                        <input type="checkbox" id="desrt-checkbox">
                                        <label for="desrt-checkbox"></label>
                                    </div>
                            </li>
                                </ul>
                            </div>
                         <!-- if Dish -->
                    </div>
                    <div class="col-md-9 content-food">
              
                         <section class="food-content row">
                                <div class="single-dish col-lg-4">
                                        <div class="thumb">
                                            <img class="img-fluid" src="https://images.media-allrecipes.com/userphotos/720x405/232795.jpg" alt="">
                                        </div>
                                      
                                        <h4 class="text-uppercase pt-20 ">California Grilled Veggie Sandwich</h4>
                                        <p class="price">
                                            Rp 50.000
                                        </p>
                                        <p>
                                            inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
                                        </p>
        
                                </div>

                                    <div class="single-dish col-lg-4">
                                            <div class="thumb">
                                                <img class="img-fluid" src="https://images.media-allrecipes.com/userphotos/720x405/232795.jpg" alt="">
                                            </div>
                                            <h4 class="text-uppercase pt-20 pb-10">California Grilled Veggie Sandwich</h4>
                                            <p>
                                                inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
                                            </p>
                                        </div>
                                        <div class="single-dish col-lg-4">
                                                <div class="thumb">
                                                    <img class="img-fluid" src="https://images.media-allrecipes.com/userphotos/720x405/232795.jpg" alt="">
                                                </div>
                                                <h4 class="text-uppercase pt-20 pb-10">California Grilled Veggie Sandwich</h4>
                                                <p>
                                                    inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
                                                </p>
                                            </div>
                                            <div class="single-dish col-lg-4">
                                                    <div class="thumb">
                                                        <img class="img-fluid" src="https://images.media-allrecipes.com/userphotos/720x405/232795.jpg" alt="">
                                                    </div>
                                                    <h4 class="text-uppercase pt-20 pb-20">California Grilled Veggie Sandwich</h4>
                                                    <p>
                                                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
                                                    </p>
                                                </div>
                                                <div class="single-dish col-lg-4">
                                                        <div class="thumb">
                                                            <img class="img-fluid" src="https://images.media-allrecipes.com/userphotos/720x405/232795.jpg" alt="">
                                                        </div>
                                                        <h4 class="text-uppercase pt-20 pb-20">California Grilled Veggie Sandwich</h4>
                                                        <p>
                                                            inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
                                                        </p>
                                                    </div>
                                                    <div class="single-dish col-lg-4">
                                                            <div class="thumb">
                                                                <img class="img-fluid" src="https://images.media-allrecipes.com/userphotos/720x405/232795.jpg" alt="">
                                                            </div>
                                                            <h4 class="text-uppercase pt-20 pb-20">California Grilled Veggie Sandwich</h4>
                                                            <p>
                                                                inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
                                                            </p>
                                                        </div>
                                                        <div class="single-dish col-lg-4">
                                                                <div class="thumb">
                                                                    <img class="img-fluid" src="https://images.media-allrecipes.com/userphotos/720x405/232795.jpg" alt="">
                                                                </div>
                                                                <h4 class="text-uppercase pt-20 pb-20">California Grilled Veggie Sandwich</h4>
                                                                <p>
                                                                    inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.
                                                                </p>
                                                            </div>
                         </section>
                         <div class="text-xs-center ">
                                <ul class="pagination">
                                    <li><a href="#" class="genric-btn primary circle pgn-left"><i class="fas fa-angle-left"></i></a></li>
                                    <li class="selected">1</li>
                                    <li>2</li>
                                    <!-- <li><a href="?p=0" data-original-title="" title="">3</a></li>  -->
                                    <li> <a href="#" class="genric-btn primary circle pgn-right"><i class="fas fa-angle-right"></i></a></li> 
                                </ul>
                            </div>
                    </div>
                </div>



            </div>
        </div>
    </div>




  </section>
  <section class="mycart-body">
    <header >
        
            <h4 class="tlt">My cart</h4>
        
        <span class="switch">
        <i class="fas fa-chevron-up"></i>
        </span>    
    </header>
    
   
        <ul class="cart-content">
           <li class="cart-data">

                <div class="product-des">
                        <p class="product-name">
                                California Grilled Veggie Sandwich
                            </p>
                            <p class="product-price">
                              Rp 50.000
                            </p>
                </div>
                <!-- <div class="product-adddel">
                   <a class="genric-btn primary">
                        <i class="fas fa-minus"></i>
                   </a>
                   <p class="tot-item">200</p>
                   <a class="genric-btn primary">
                        <i class="fas fa-plus"></i>
                   </a>
                </div> -->
                <div class="product-remove">
                <a class="genric-btn primary">
                <i class="fas fa-trash-alt"></i>
                </a>
              </div>
           </li>


           <li class="cart-data">

            <div class="product-des">
                    <p class="product-name">
                            California Grilled Veggie Sandwich
                        </p>
                        <p class="product-price">
                          Rp 50.000
                        </p>
            </div>
            <!-- <div class="product-adddel">
               <a class="genric-btn primary">
                    <i class="fas fa-minus"></i>
               </a>
               <p class="tot-item">200</p>
               <a class="genric-btn primary">
                    <i class="fas fa-plus"></i>
               </a>
            </div> -->
            <div class="product-remove">
            <a class="genric-btn primary">
            <i class="fas fa-trash-alt"></i>
            </a>
          </div>
       </li>



       <li class="cart-data">

        <div class="product-des">
                <p class="product-name">
                        California Grilled Veggie Sandwich
                    </p>
                    <p class="product-price">
                      Rp 50.000
                    </p>
        </div>
        <!-- <div class="product-adddel">
           <a class="genric-btn primary">
                <i class="fas fa-minus"></i>
           </a>
           <p class="tot-item">200</p>
           <a class="genric-btn primary">
                <i class="fas fa-plus"></i>
           </a>
        </div> -->
        <div class="product-remove">
        <a class="genric-btn primary">
        <i class="fas fa-trash-alt"></i>
        </a>
      </div>
   </li>


        </ul>

        <footer>
            <a href="#" class="genric-btn primary finish-order radius">
            Finish Order
            </a>    
        </footer>

  </section>

@endsection


@section('javascript')
{{ Html::script('js/vendor/jquery-2.2.4.min.js') }}
{{ Html::script('js/vendor/angularjs-1.7.5.min.js') }}
{{ Html::script('js/vendor/popper.1.12.9.min.js') }}
{{ Html::script('js/vendor/bootstrap.min.js') }}
{{ Html::script('js/vendor/mapbox-gl.52.0.js') }}
{{ Html::script('js/superfish.min.js') }}
{{ Html::script('js/jquery.magnific-popup.min.js') }}
{{ Html::script('js/owl.carousel.min.js') }}
{{ Html::script('js/main.js') }}
{{ Html::script('js/app.js') }}		
@endsection