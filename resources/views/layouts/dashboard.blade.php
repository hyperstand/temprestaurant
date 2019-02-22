@extends('skeleton')

@section('css')
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
<link rel="stylesheet" href="css/linearicons.css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
    crossorigin="anonymous">
<link rel="stylesheet" href="css/nice-select.css">
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/booking.css">
<link rel="stylesheet" href="css/loading.css">
<link rel="stylesheet" href="css/clockpicker.css">
<link rel="stylesheet" href="http://eonasdan.github.io/bootstrap-datetimepicker/content/bootstrap-datetimepicker.css">
@endsection

@section('title','Dashboard')

@section('component')
@include('component.ifloginnav')


{{-- modal booking --}}
<div class="modal fade" ng-controller="DashboardController" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="max-width: 400px;margin: 0 auto;">
            <h4><%Title[panel.position]%></h4>
            {{-- main --}}
            <form class="booking-modal" ng-show="panel.position == 0" ng-class="{ 'change-right': panel.position == 0 &&  panel.animate }">
                <div class="mt-10">
                    <p class="title">Date</p>
                    <div class="picker">
                        <p>
                            <% Info.Date_info %>
                        </p>
                        <a href="" class="genric-btn primary" ng-click="changepage(1)">
                            <i class="fas fa-calendar-alt"></i>
                        </a>
                    </div>

                </div>
                <div class="mt-10">
                    <p class="title">Time</p>
                    <div class="picker">
                        {{-- <p>08:00 AM</p> --}}
                        <p>
                            <% Info.Time_info %>
                        </p>
                        <a href="" class="genric-btn primary" ng-click="changepage(2)">
                            <i class="far fa-clock"></i>
                        </a>
                    </div>
                </div>
                <div class="mt-10">
                    <p class="title">Number Of People</p>
                    <div class="product-adddel">
                        <a class="genric-btn primary" ng-click="togglepeople('delete')">
                            <i class="fas fa-minus"></i>
                        </a>
                        <p class="tot-item">
                            <% Info.People_info %> People</p>
                        <a href="" class="genric-btn primary" ng-click="togglepeople('add')">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>

                <a href="" class="mt-20 genric-btn primary radius">
                    Finish Booking</a>
            </form>

            {{-- pick date --}}
            <form class="date-modal" ng-show="panel.position == 1" ng-class="{ 'change-left': panel.position == 1 &&  panel.animate == true}">
                <div class="calendar-header">

                    <a class="rad genric-btn primary radius" href ng-click="moveBack()">
                        <i class="fas fa-chevron-left"></i>
                    </a>

                    <div class="current-month-container">
                        <% currentMonthName() %>
                        <% currentViewDate.getFullYear() %>
                    </div>

                    <a class="rad genric-btn primary radius" href ng-click="moveForward()">
                        <i class="fas fa-chevron-right"></i>
                    </a>

                </div>



                <div class="calendar-day-header">
                    <div ng-repeat="day in days" class="day-label">
                        <% day.short %>
                    </div>
                </div>

                <div class="calendar-grid" ng-class="{false: 'no-hover'}[pickdate]">
                    <div ng-class="{'no-hover': !day.showday}" ng-repeat="day in month" class="datecontainer" ng-style="{'margin-left': calcOffset(day, $index)}"
                        track by $index>
                        <div class="datenumber" ng-class="{'day-selected': day.selected }" ng-click="selectDate(day)">
                            <% day.daydate %>
                        </div>
                    </div>
                </div>

                <a href="" class="mt-20 genric-btn primary radius" ng-click="changepage(0)" style="width:100%;font-weight:500;font-size:1em;">
                    Confirm Date</a>
            </form>
            <form class="time-modal" ng-show="panel.position == 2" style="min-height:200px"  ng-class="{ 'change-left': panel.position == 2 && panel.animate}">          
                    <button href class="genric-btn primary radius " ng-repeat="time in avatime" ng-click="gettime(time)"><% time.long %></button>                           
                    <div ng-if="avatime.length < 0">
                    @include('component.spinner');
                    </div>
            </form>

            {{-- <form class="time-modal">
                <div class="clockpicker-plate">
                    <div class="clockpicker-canvas"><svg class="clockpicker-svg" width="270" height="270">
                            <g transform="translate(135,135)">
                                <line x1="0" y1="0" x2="90" y2="-5.5109105961630896e-15"></line>
                                <circle class="clockpicker-canvas-fg" r="5" cx="110" cy="-6.735557395310443e-15"></circle>
                                <circle class="clockpicker-canvas-bg" r="20" cx="110" cy="-6.735557395310443e-15"></circle>
                                <circle class="clockpicker-canvas-bearing" cx="0" cy="0" r="2"></circle>
                            </g>
                        </svg></div>
                    <div class="clockpicker-dial clockpicker-hours" style="visibility: visible;">
                        <div class="clockpicker-tick" style="left: 115px; top: 5px;">00</div>
                        <div class="clockpicker-tick" style="left: 155px; top: 45.718px; font-size: 120%;">1</div>
                        <div class="clockpicker-tick" style="left: 184.282px; top: 75px; font-size: 120%;">2</div>
                        <div class="clockpicker-tick" style="left: 195px; top: 115px; font-size: 120%;">3</div>
                        <div class="clockpicker-tick" style="left: 184.282px; top: 155px; font-size: 120%;">4</div>
                        <div class="clockpicker-tick" style="left: 155px; top: 184.282px; font-size: 120%;">5</div>
                        <div class="clockpicker-tick" style="left: 115px; top: 195px; font-size: 120%;">6</div>
                        <div class="clockpicker-tick" style="left: 75px; top: 184.282px; font-size: 120%;">7</div>
                        <div class="clockpicker-tick" style="left: 45.718px; top: 155px; font-size: 120%;">8</div>
                        <div class="clockpicker-tick" style="left: 35px; top: 115px; font-size: 120%;">9</div>
                        <div class="clockpicker-tick" style="left: 45.718px; top: 75px; font-size: 120%;">10</div>
                        <div class="clockpicker-tick" style="left: 75px; top: 45.718px; font-size: 120%;">11</div>
                        <div class="clockpicker-tick" style="left: 115px; top: 35px; font-size: 120%;">12</div>
                        <div class="clockpicker-tick" style="left: 170px; top: 19.7372px;">13</div>
                        <div class="clockpicker-tick" style="left: 210.263px; top: 60px;">14</div>
                        <div class="clockpicker-tick" style="left: 225px; top: 115px;">15</div>
                        <div class="clockpicker-tick" style="left: 210.263px; top: 170px;">16</div>
                        <div class="clockpicker-tick" style="left: 170px; top: 210.263px;">17</div>
                        <div class="clockpicker-tick" style="left: 115px; top: 225px;">18</div>
                        <div class="clockpicker-tick" style="left: 60px; top: 210.263px;">19</div>
                        <div class="clockpicker-tick" style="left: 19.7372px; top: 170px;">20</div>
                        <div class="clockpicker-tick" style="left: 5px; top: 115px;">21</div>
                        <div class="clockpicker-tick" style="left: 19.7372px; top: 60px;">22</div>
                        <div class="clockpicker-tick" style="left: 60px; top: 19.7372px;">23</div>
                    </div>

                </div>
            </form> --}}

        </div>
    </div>
</div>



<section class="booking-body">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-3 col-md-10  col-sm-12" style="border:1px solid red;">
                <div class="user-info">
                    <img src="https://yt3.ggpht.com/-FpoBOVwSiE0/AAAAAAAAAAI/AAAAAAAAAAA/Yf-SnwkfdQ4/s88-c-k-no-mo-rj-c0xffffff/photo.jpg"
                        alt="">

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

            <div class="col-lg-8 col-md-10" ng-controller="DashboardController">

                <div class="x-body">
                    <h4>Booking</h4>

                    {{-- No Booking --}}
                    <div class="no-data-body">
                        <p>You Have No Booking</p>
                        <a href="#" class="genric-btn primary-border radius" ng-click="openmodal()">Book
                            A Table</a>
                    </div>

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
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum sint voluptatibus
                                    nesciunt est inventore, asperiores libero nam sequi iure a quas aut repudiandae
                                    numquam optio hic perspiciatis, vitae id culpa?</p>
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
<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="js/vendor/popper.1.12.9.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/angularjs-1.7.5.min.js"></script>
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
<script src="js/controller/dashboard.controller.js"></script>
@endsection