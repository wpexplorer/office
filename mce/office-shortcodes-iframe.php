<?php
// this file contains the contents of the popup window

/**
 * Get wp-load.php to use in popup
 */
$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $parse_uri[0].'wp-load.php';
require_once($wp_load); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Insert Shortcode</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<style type="text/css" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/themes/advanced/skins/wp_theme/dialog.css"></style>
<link rel="stylesheet" href="css/shortcode_tinymce.css" />

<script>
 jQuery(document).ready(function($){
	 
	//select shortcode
	$("#shortcode-select").change(function () {
		  var shortcodeSelectVal = "";
		  var shortcodeSelectText = "";
		  $("#shortcode-select option:selected").each(function () {
				shortcodeSelectVal += $(this).val();
				shortcodeSelectText += $(this).text();
			  });
			  if( shortcodeSelectVal != 'default') {
				$('#selected-shortcode').load('shortcodes/'+shortcodeSelectVal+'.php', function(){
					$('.shortcode-editor-title').text(shortcodeSelectText + ' Editor');
				});
			  } else {
			  	$('#selected-shortcode').text('Select Your Shortcode Above To Get Started').addClass('padding-bottom');
				$('.shortcode-editor-title').text('Shortcode Editor');
			  }
		})
		.trigger('change');
	
 });
</script>
    
</head>
<body>

<div id="office-shortcodes-popup">

	<h2 id="shortcode-selector-title">Shortcode Selector</h2>

	<div id="select-shortcode">
    	<div id="select-shortcode-inner">
    
		<form action="/" method="get" accept-charset="utf-8">
			<div>
				<select name="shortcode-select" id="shortcode-select" size="1">
               		<option value="default" selected="selected">Shortcodes</option>
                	<option value="accordion">Accordion</option>
                	<option value="alert">Alert</option>
               		<option value="button">Button</option>
                    <option value="column">Column</option>
                    <option value="googlemap">Google Map</option>
                    <option value="list">List</option>
					<option value="hr">HR (Divider)</option>
                    <option value="icon_button">Icon Button</option>
                    <option value="pricing">Pricing Table</option>
                    <option value="testimonial">Testimonial</option>
                    <option value="tabs">Tabs</option>
                    <option value="toggle">Toggle</option>
                    
				</select>
			</div>
		</form>
        </div>
        <!-- /select-shortcode-inner -->
	</div>
    <!-- /select-shortcode-wrap -->
    
    <h2 class="shortcode-editor-title"></h2>
	<div id="shortcode-editor">
    	<div id="shortcode-editor-inner" class="clearfix">
			<div id="selected-shortcode"></div>
		</div>
        <!-- /shortcode-dialog-inner -->
	</div>
    <!-- /shortcode-dialog -->
    
    
</div>
<!-- /office-shortcodes-popup -->

</body>
</html>