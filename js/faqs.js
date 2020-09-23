(function($) {
	"use strict";
	function officeFaqToggles() {
		$(".faq-title").click( function() {
			$(this).toggleClass("active").next('.faq-content').slideToggle('normal', function() {
				$('#faqs-wrap').isotope( 'layout' );
			});
			return false;
		});
	} officeFaqToggles();
	function officeFaqIsotope() {
			var $container = $('#faqs-wrap');
			$container.isotope( {
				layoutMode: 'vertical',
				itemSelector: '.faq-item',
				vertical: {
					horizontalAlignment: 0
				}
			});
			$('#faqs-cats li a').click(function() {	
				var selector = $(this).attr('data-filter');
				$container.isotope({
					filter: selector
				});
				$(this).parents('ul').find('a').removeClass('active');
				$(this).addClass('active');
				return false;
			});
	} officeFaqIsotope();		
	$(window).resize(function () {
		officeFaqIsotope();
	});
})(jQuery);