jQuery(function($){
	$(document).ready(function(){

		$('<div class="office-mobile-menu-select"><select></div>').appendTo("#navigation");
		$("<option />", {
		   "selected": "selected",
		   "value" : "",
		    "text" : responsiveLocalize.text
		}).appendTo(".office-mobile-menu-select select");

		$("#navigation a").each(function() {
			var el = $(this);
			if(el.parents('.sub-menu .sub-menu').length >= 1) {
				$('<option />', {
				 'value' : el.attr('href'),
				 'text' : '-- ' + el.text()
				}).appendTo(".office-mobile-menu-select select");
			}
			else if(el.parents('.sub-menu').length >= 1) {
				$('<option />', {
				 'value' : el.attr("href"),
				 'text' : '- ' + el.text()
				}).appendTo(".office-mobile-menu-select select");
			}
			else {
				$('<option />', {
				 'value' : el.attr('href'),
				 'text' : el.text()
				}).appendTo(".office-mobile-menu-select select");
			}
		});

		$(".office-mobile-menu-select select").change(function() {
		  window.location = $(this).find("option:selected").val();
		});

		$(".fitvids").fitVids();
		$(".office-mobile-menu-select select").uniform();

	});
});