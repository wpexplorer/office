jQuery(function($){
	$(document).ready(function(){
		
		function officeHomePortCarousel() {
			$('#home-portfolio-carousel').carouFredSel({
				circular: false,
				infinite: true,
				width: 720,
				wipe: true,
				items: {
					minimum: 3,
					visible: 3
				},
				pagination: {
				  duration: 700,
				  items: 3,
				  container: "#carousel-pagination"
				},
				  prev    : {
					  button: "#carousel-prev",
					  key: "",
					  duration: 700
			  },
			  next    : {
				  button: "#carousel-next",
				  key: "",
				  duration: 700
			  },
				auto: false,
				scroll: {
				  duration: 700
				}
			});
			var $carouselwidth = $('#carousel-pagination').outerWidth();
			$('#carousel-pagination').css("marginLeft", -$carouselwidth/2);	
		}
		
		function officeHomePortCarouselResize() {
			var $windowWidth = $(window).width();
			if ( $windowWidth >= 767 ) {
				officeHomePortCarousel();
			} else {
				$('#home-portfolio-carousel').trigger('destroy', { origOrder: true });
			}
		}
		
		if ( $(window).width() >= 767 ) {
			officeHomePortCarousel();
		}
		
		$(window).resize(function() {
			officeHomePortCarouselResize();
		});
		
	});
});