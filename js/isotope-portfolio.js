jQuery(function($){
	$(window).load(function() {
		
		function officePortfolioIsotope() {
			var $container = $('.portfolio-content');
			$container.isotope();
			$('.filter a').click(function(){				
			  var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector });
				$(this).parents('ul').find('a').removeClass('active');
				$(this).addClass('active');
			  return false;
			});
		} officePortfolioIsotope();
				
		$(window).resize(function () {
			officePortfolioIsotope();
		});
		
	});
});

