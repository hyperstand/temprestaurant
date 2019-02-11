$( window ).load(function() {
    if(document.getElementById("map")){
        console.log('load map');        
        mapboxgl.accessToken = 'pk.eyJ1IjoibGFsYTEyMTIiLCJhIjoiY2pvc3RoNTUyMHUyNDNqcHR4MGZrNjd6ZCJ9.5MOx28fKyQSzcx2-Z1aOBg';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v9'
        });
    }
});

ModuleDeclare.directive("owlCarousel",function() {
	return {
		restrict: 'E',
        transclude: false,
        link:function(scope)
        {
            scope.food_list=[
                {food_name:"ABC",food_desc:"Who are in extremely love with eco friendly system. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",link:"$",img_url:"img/slider1.jpg"},
                {food_name:"ABC",food_desc:"Who are in extremely love with eco friendly system. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",link:"$",img_url:"img/slider1.jpg"}];
            scope.initCarousel = function(element) {
                $(window).load(function() {
				$(element).owlCarousel({
                        items:1,
                        loop:true,
                        // margin: 100,
                        // dots: true,
                        nav:true,
                        navText: ["<span class='fas fa-chevron-up'></span>","<span class='fas fa-chevron-down'></span>"],                
                        autoplay:true,
                        responsive: {
                            0: {
                                items: 1
                            },
                            480: {
                                items: 1,
                            },
                            768: {
                                items: 1,
                            }
                        }
                    });
            });
        };
        }
	};
})

.directive('owlCarouselItem', [function() {
	return {
        restrict: 'A',
        transclude : false,
		link: function(scope, element) {
          // wait for the last item in the ng-repeat then call init
			if(scope.$last) {
				scope.initCarousel(element.parent());
			}
		}
	};
}]);