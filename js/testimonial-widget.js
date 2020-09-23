jQuery(function($){
	$(document).ready(function(){
		$('.widget-recent-testimonials .flexslider').flexslider({
			animation: "fade", //Select your animation type (fade/slide)
			slideshow: true, //Should the slider animate automatically by default? (true/false)
			slideshowSpeed: 6000, //Set the speed of the slideshow cycling, in milliseconds
			smoothHeight: false, //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode
			animationDuration: 800, //Set the speed of animations, in milliseconds
			directionNav: false, //Create navigation for previous/next navigation? (true/false)
			controlNav: true, //Create navigation for paging control of each slide? (true/false)
			keyboardNav: false, //Allow for keyboard navigation using left/right keys (true/false)
			touchSwipe: true, //Touch swipe gestures for left/right slide navigation (true/false)
			prevText: "Previous", //Set the text for the "previous" directionNav item
			nextText: "Next", //Set the text for the "next" directionNav item
			pausePlay: false, //Create pause/play dynamic element (true/false)
			pauseText: 'Pause', //Set the text for the "pause" pausePlay item
			playText: 'Play', //Set the text for the "play" pausePlay item
			randomize: false, //Randomize slide order on page load? (true/false)
			slideToStart: 0, //The slide that the slider should start on. Array notation (0 = first slide)
			animationLoop: true, //Should the animation loop? If false, directionNav will received disabled classes when at either end (true/false)
			pauseOnAction: true, //Pause the slideshow when interacting with control elements, highly recommended. (true/false)
			pauseOnHover: false //Pause the slideshow when hovering over slider, then resume when no longer hovering (true/false)
		});	
	});
});