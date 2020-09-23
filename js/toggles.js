jQuery(function($){
	$(document).ready(function(){
		$(".toggle_container").hide(); 
		$("h3.trigger").click(function(){
			$(this).toggleClass("active").next().slideToggle("fast");
			return false;
		});
	});
});