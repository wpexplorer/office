jQuery(function($){
	$(window).load(function() {
		if(flexLocalize.slideshow == "true") flexLocalize.slideshow = true; else flexLocalize.slideshow = false;
		if(flexLocalize.randomize == "true") flexLocalize.randomize = true; else flexLocalize.randomize = false;	
		if(flexLocalize.slideshowSpeed !== '') flexLocalize.slideshowSpeed = flexLocalize.slideshowSpeed; else flexLocalize.slideshowSpeed = 7000;
		$('body.home #full-slides').flexslider({
			animation: flexLocalize.animation, /*Select your animation type (fade/slide)*/
			smoothHeight: true,
			direction: flexLocalize.direction,   /*String: Select the sliding direction, "horizontal" or "vertical"*/
			slideshow: flexLocalize.slideshow, /*Should the slider animate automatically by default? (true/false)*/
			smoothHeight: true, //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode
			slideshowSpeed: flexLocalize.slideshowSpeed, /*Set the speed of the slideshow cycling, in milliseconds*/
			animationDuration: 800, /*Set the speed of animations, in milliseconds*/
			directionNav: true, /*Create navigation for previous/next navigation? (true/false)*/
			controlNav: false, /*Create navigation for paging control of each slide? (true/false)*/
			keyboardNav: true, /*Allow for keyboard navigation using left/right keys (true/false)*/
			touchSwipe: true, /*Touch swipe gestures for left/right slide navigation (true/false)*/
			prevText: "Previous", /*Set the text for the "previous" directionNav item*/
			nextText: "Next", /*Set the text for the "next" directionNav item*/
			pausePlay: false, /*Create pause/play dynamic element (true/false)*/
			pauseText: 'Pause', /*Set the text for the "pause" pausePlay item*/
			playText: 'Play', /*Set the text for the "play" pausePlay item*/
			randomize: flexLocalize.randomize, /*Randomize slide order on page load? (true/false)*/
			slideToStart: 0, /*The slide that the slider should start on. Array notation (0 = first slide)*/
			animationLoop: true, /*Should the animation loop? If false, directionNav will received disabled classes when at either end (true/false)*/
			pauseOnAction: true, /*Pause the slideshow when interacting with control elements, highly recommended. (true/false)*/
			pauseOnHover: true /*Pause the slideshow when hovering over slider, then resume when no longer hovering (true/false)*/
		});		
	});
});