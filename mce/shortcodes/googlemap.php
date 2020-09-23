<script type="text/javascript">
var GoogleMapDialog = {
	local_ed : 'ed',
	init : function(ed) {
		GoogleMapDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertGoogleMap(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var url = jQuery('input#googlemap-url').val();
		var height = jQuery('input#googlemap-height').val();
		var width = jQuery('input#googlemap-width').val();
		 
		var output = '';
		
		// setup the output of our shortcode
		output = '&nbsp;';
		output = '[googlemap ';
		output += ' src=\"'+ url +'\"';
		if(height) {
			output += ' height=' + height;
		} else {
			output += ' height=200';
		}
		if(width) {
			output += ' width=' + width;
		} else {
			output += ' width=200';
		}
		output += ']';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(GoogleMapDialog.init, GoogleMapDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
    <div class="form-section clearfix">
        <label for="googlemap-url">URL</label>
        <input type="text" name="googlemap-url" value="" id="googlemap-url" />
    </div>
	<div class="form-section clearfix">
        <label for="googlemap-width">Width</label>
        <input type="text" name="googlemap-width" value="" id="googlemap-width" />
    </div>
	<div class="form-section clearfix">
        <label for="googlemap-height">height</label>
        <input type="text" name="googlemap-height" value="" id="googlemap-height" />
    </div>
	<a href="javascript:GoogleMapDialog.insert(GoogleMapDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>