jQuery(function($){
	$(document).ready(function(){
		
		//staff details
		$('.staff-member').hover(function(){
			
			var $staffmeta = $(this).children('.staff-meta');
			var $topvalue = ($staffmeta).outerHeight() + 10;
			
			$($staffmeta).stop(true, true).show().animate({
					top: -$topvalue
				}, 200);
			
			}, function(){
				$(this).children('.staff-meta').stop(true, true).hide().css({
					top: -20
				}, 1000);
		});
		
		//staff opacity animation
		$("#staff-wrap").delegate(".staff-member", "mouseover mouseout", function(e) {
			if (e.type == 'mouseover') {
				$(".staff-member").not(this).dequeue().animate({opacity: "0.4"}, 200);
			} else {
				$(".staff-member").not(this).dequeue().animate({opacity: "1"}, 200);}
		});
		
		//staff opacity animation - categories
		$(".staff-category").delegate(".staff-member", "mouseover mouseout", function(e) {
			if (e.type == 'mouseover') {
				$(".staff-member").not(this).dequeue().animate({opacity: "0.4"}, 200);
			} else {
				$(".staff-member").not(this).dequeue().animate({opacity: "1"}, 200);}
		});
		
	});
});