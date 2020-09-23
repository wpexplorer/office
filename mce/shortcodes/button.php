<script type="text/javascript">
var ButtonDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ButtonDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var url = jQuery('input#button-url').val();
		var text = jQuery('input#button-text').val();
		var color = jQuery('select#button-color').val(); 
		var linkTarget = jQuery('select#link-target').val(); 
		 
		 
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		
		// setup the output of our shortcode
		var output = '';
		
		output = '&nbsp;';
		output = '[button ';
		output += 'color=' + color + ' ';
			
		// only insert if the url field is not blank
		if(url) {
			output += ' url=' + url;
		}
		
		if(linkTarget){
			output += ' target=' + linkTarget;
		}
		
		//insert text
		if(text) {	
			output += ']'+ text + '[/button]';
		}
		else {
			
		// if it is blank, use selected content
			output += ']' + mceSelected + '[/button]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
	<div class="form-section clearfix">
        <label for="button-color">Color</label>
        <select name="button-color" id="button-color" size="1">
            <option value="black" selected="selected">Black</option>
            <option value="blue">Blue</option>
            <option value="brown">Brown</option>
            <option value="light-gray">Light Gray</option>
            <option value="gold">Gold</option>
            <option value="gray">Gray</option>
            <option value="green">Green</option>
            <option value="orange">Orange</option>
            <option value="pink">Pink</option>
            <option value="purple">Purple</option>
            <option value="red">Red</option>
        </select>
    </div>
	<div class="form-section clearfix">
        <label for="link-target">Target</label>
        <select name="link-target" id="link-target" size="1">
            <option value="self" selected="selected">Self</option>
            <option value="blank">Blank</option>
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="button-url">URL</label>
        <input type="text" name="button-url" value="" id="button-url" />
    </div>
    <div class="form-section clearfix">
        <label for="button-text">Text<br /><small>Leave Blank To Use Highlighted</small></label>
        <input type="text" name="button-text" value="" id="button-text" />
    </div>
	<a href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>