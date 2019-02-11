ModuleDeclare.directive("gallery", function() {
	return {
		restrict: 'E',
		transclude: false,
		link: function (scope) {
			scope.Data=[{Date:"Jan 2018",Image:[{img_url:"https://d22ir9aoo7cbf6.cloudfront.net/wp-content/uploads/sites/3/2018/03/Bunga-Rampai-Indonesian-Restaurants-Jakarta.jpg"},{img_url:"https://d22ir9aoo7cbf6.cloudfront.net/wp-content/uploads/sites/3/2018/03/Bunga-Rampai-Indonesian-Restaurants-Jakarta.jpg"}]},{Date:"Jan 2018",Image:[{img_url:"https://d22ir9aoo7cbf6.cloudfront.net/wp-content/uploads/sites/3/2018/03/Bunga-Rampai-Indonesian-Restaurants-Jakarta.jpg"},{img_url:"https://b.zmtcdn.com/data/reviews_photos/e67/1ee3f64b0193ef6c7319b5d4ad876e67_1516954004.jpg?fit=around%7C800%3A800&crop=800%3A800%3B%2A%2C%2A"}]}];
			scope.initGallery = function(element) {
			
				$( window ).ready(function(){
				$(element).magnificPopup({
					type: 'image',
					delegate: 'a',
					gallery:{
					enabled:true
					}
			});
				
			});
			
			};
		}
	};
})
.directive('galleryImage', [function() {
	return {
		restrict: 'A',
		transclude: false,
		link: function(scope, element) {
			if(scope.$last) {
				console.log('c');
				$('.Loading-content').toggleClass('hide');
				scope.initGallery(element.parent());
			}
		}
	};
}]);