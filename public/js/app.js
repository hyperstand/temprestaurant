var ModuleDeclare=angular.module("App", ["ngMessages" ],function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});



ModuleDeclare.directive('imageonload', function() {
    return {
        restrict: 'A',
        scope: {
            imgsrc: '=',
            onloadimg: '&'
        },
        link: function(scope, element, attrs) {
            element.bind('load', function() {
                scope.onloadimg();
            });
            // element.bind('error', function(){
            //     alert('image could not be loaded');
            // });
        }
    };
});

ModuleDeclare.config(function ($provide) {
    $provide.provider('urlprovider', function () {
        this.$get = function () {

            var URL_SCEMA;

            var provide = function(params){
                const paramlist = new URLSearchParams(location.search);
                URL_SCEMA=params;
                var result;
                if($.isArray(params)){
                    result=params.map(function(entry) {
                        var res=paramlist.get(entry),item={};
                        if(entry == "fltr" && res!=null)
                        {  
                            item[entry]=(res.split(",")).map(function(result){
                                return result;
                           });

                        }else if(entry == "page" && res!=null)
                        {   if(!isNaN(res) && parseInt(Number(res)) == res && !isNaN(parseInt(res, 10)))
                                {item[entry] = Number(res);}
                            else
                                {item[entry] =null;}
                        }else if(entry == "search"&&res!=null){
                            item[entry] = res;
                        }else if( (entry == "search" && res == null) ||(entry == "page" && res == null))
                        {
                            item[entry]=null;
                        }else if((entry == "fltr" && res == null) ){
                            item[entry]=[];
                        }
                        return item; 
                      });
                }
 
                //new object;
                return result;
            }
        
            var url_build=function(URL,pos)
            {
                URL+="?";
                pos.forEach(function(p,i){
                    if(p[URL_SCEMA[i]] != null )
                    {URL += `${URL_SCEMA[i]}=${p[URL_SCEMA[i]]}&`;}    
                });
                return URL;
            }

            var is_integer_less_pagi=function(variable,max_pagi){

                if (!isNaN(variable) && parseInt(Number(variable)) == variable && !isNaN(parseInt(variable, 10)))
                    {
                        if(variable-1 < 4){
                            return true;
                        }else{
                            return false;
                        }
                    }
                else
                {
                    return false;
                }
                    
            }
            return {
                paramschecker: provide,
                is_integer_less_pagi:is_integer_less_pagi,
                scema_build:url_build
            };
        }
    })
});

////////////////////////////////////////////jqurey////////////////////////////////////////

$( window ).load(function() {

    $(window).resize(($event)=>{
        var window_size_width = $(this).width(),
            window_size_height = $(this).height();
        console.log(window_size_height);

        if(window_size_width > 785)
          {
            if($('.hamb').is(':checked'))
                  {
                    $('body').toggleClass('mobile-nav-active');
                    $('#mobile-body-overly').toggle();
                    $('.hamb'). prop("checked", false);
                  }
          }
    })


    .click(($event)=>{
        if($event.target.className == 'hamb')
        {    
        $('body').toggleClass('mobile-nav-active');
        $('#mobile-body-overly').toggle();
        }else{
            $('.hamb'). prop("checked", false);
        }
    }).scroll(function() {
        // Header scroll class transition navbar
        if ($(this).scrollTop() > 100) {
          $('#header').addClass('header-scrolled');
          $('#mobile-nav-toggle span').addClass('header-scrolled');
 
        } else {
          $('#header').removeClass('header-scrolled');
          $('#mobile-nav-toggle span').removeClass('header-scrolled');

        }
      });
      
      
    //   $('.active-realated-carusel').owlCarousel({
    //     items:1,
    //     loop:true,
    //     margin: 100,
    //     dots: true,
    //     nav:true,
    //     navText: ["<span class='fas fa-chevron-up'></span>","<span class='fas fa-chevron-down'></span>"],                
    //     autoplay:true,
    //     responsive: {
    //         0: {
    //             items: 1
    //         },
    //         480: {
    //             items: 1,
    //         },
    //         768: {
    //             items: 1,
    //         }
    //     }
    // });
      
});





$(document).ready(function(){
	"use strict";

	var window_width 	 = $(window).width(),
	window_height 		 = window.innerHeight,
	header_height 		 = $(".default-header").height(),
	header_height_static = $(".site-header.static").outerHeight(),
	fitscreen 			 = window_height - header_height;

	$(".fullscreen").css("height", window_height)
	$(".fitscreen").css("height", fitscreen);

     if(document.getElementById("default-select")){
          $('select').niceSelect();
    };

    $('.nav-menu').superfish({
        animation: {
        opacity: 'show'
        },
        speed: 400
    });   

  // Mobile Navigation
  if ($('#nav-menu-container').length) {

    var $mobile_nav = $('#nav-menu-container').clone().prop({
      id: 'mobile-nav'
    });
    
    function chckvar(){
        var attr;
        if($('#nav-menu-container').find(".not-login").length > 0)
        {
          attr= {'class': '','id': ''};
        }else{attr= {'class': 'reverse-item','id': ''};}
        return attr;
    };

    $mobile_nav.find('> ul').attr(chckvar());

    $('body').append($mobile_nav);
    $('body').prepend('<div id="mobile-nav-toggle"><input type="checkbox" class="hamb"/><span></span><span></span><span></span></div>');
    $('body').append('<div id="mobile-body-overly"></div>');
    $('#mobile-nav').find('.menu-has-children').prepend('<i class="fas fa-chevron-down"></i>');

    $(document).on('click', '.menu-has-children i', function(e) {
      $(this).next().toggleClass('menu-item-active');
      $(this).nextAll('ul').eq(0).slideToggle();
      $(this).toggleClass("fa-chevron-up fa-chevron-down");
    });

    $(document).click(function(e) {
      var container = $("#mobile-nav, #mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
            // close mobilenav
            $('body').removeClass('mobile-nav-active');
            $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
            $('#mobile-body-overly').fadeOut();
        }
      }
    });

    } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
        $("#mobile-nav, #mobile-nav-toggle").hide();
        
    }

  // Smooth scroll for the menu and links with .scrollto classes
  $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        var top_space = 0;

        if ($('#header').length) {
          top_space = $('#header').outerHeight();

          if( ! $('#header').hasClass('header-fixed') ) {
            top_space = top_space;
          }
        }

        $('html, body').animate({
          scrollTop: target.offset().top - top_space
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.nav-menu').length) {
          $('.nav-menu .menu-active').removeClass('menu-active');
          $(this).closest('li').addClass('menu-active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('lnr-times lnr-bars');
          $('#mobile-body-overly').fadeOut();
        }
        return false;
      }
    }
  });


    $(document).ready(function() {

    $('html, body').hide();

        if (window.location.hash) {

        setTimeout(function() {

        $('html, body').scrollTop(0).show();

        $('html, body').animate({

        scrollTop: $(window.location.hash).offset().top

        }, 1000)

        }, 0);

        }

        else {

        $('html, body').show();

        }

    });

 });