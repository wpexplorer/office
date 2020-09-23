<script type="text/javascript">
var alertDialog = {
	local_ed : 'ed',
	init : function(ed) {
		alertDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertalert(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		 
		// set up variables to contain our input values
		var color = jQuery('select#alert-color').val();		 
		var align = jQuery('select#alert-align').val();	
		var title = jQuery('input#alert-title').val();			
		var content = jQuery('textarea#alert-content').val(); 
		 
		 
		// setup the output of our shortcode
		var output = '';

			//add break on centered alert
			if(align == 'center') {
				output = '&nbsp;';
			}
			
			output = '[alert ';
			output += 'color=' + color + ' ';
			if(title) {
				output += 'title=\"' + title + '\"';
			}
			output += ' align=' + align;
		
		// check to see if the content field is blank
		if(content) {	
			output += ']'+ content + '[/alert]';
		}
		
		// if it is blank, use selected content
		else {
			output += ']' + mceSelected + '[/alert]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(alertDialog.init, alertDialog);
</script>
<form action="/" method="get" accept-charset="utf-8">
    <div class="form-section clearfix">
        <label for="alert-color">Color</label>
        <select name="alert-color" id="alert-color" size="1">
            <option value="blue" selected="selected">Blue</option>
            <option value="yellow"=>Yellow</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
        </select>
    </div>
   <div class="form-section clearfix">
        <label for="alert-align">Alignment</label>
        <select name="alert-align" id="alert-align" size="1">
            <option value="center" selected="selected">Center</option>
            <option value="left">Left</option>
            <option value="right">Right</option>
        </select>
    </div>
	<div class="form-section clearfix">
        <label for="alert-title">Title</label>
        <input type="text" name="alert-title" value="" id="alert-title" />
    </div>
    <div class="form-section clearfix">
        <label for="alert-content">Content<br /><small>Leave Blank To Use Highlighted</small></label>
        <textarea type="text" name="alert-content" value="" id="alert-content"></textarea>
    </div>
	<a href="javascript:alertDialog.insert(alertDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>