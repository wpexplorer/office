<script type="text/javascript">
var ColumnDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ColumnDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertColumn(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		 
		// set up variables to contain our input values
		var size = jQuery('select#column-size').val();
		var position = jQuery('select#column-position').val();
		var content = jQuery('textarea#column-content').val();
		 
		var output = '';
		
		// setup the output of our shortcode
		output = '[column ';
		output += 'size=' + size + ' ';
		output += 'position=' + position + ' ';
		
		// check to see if the content field is blank
		if(content) {	
			output += ']'+ content + '[/column]';
		}
		
		// if it is blank use selected text
		else {
			output += ']' + mceSelected + '[/column]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ColumnDialog.init, ColumnDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
    <div class="form-section clearfix">
        <label for="column-size">Size</label>
        <select name="column-size" id="column-size" size="1">
            <option value="half" selected="selected">1/2</option>
            <option value="third">1/3</option>
            <option value="fourth">1/4</option>
            <option value="fifth">1/5</option>
            <option value="sixth">1/6</option>
            <option value="two-third">2/3</option>
            <option value="three-fourth">3/4</option>
        </select>
    </div>
	<div class="form-section clearfix">
        <label for="column-position">Position</label>
        <select name="column-position" id="column-position" size="1">
            <option value="first" selected="selected">First</option>
            <option value="last">last</option>
        </select>
    </div>
	<div class="form-section clearfix">
        <label for="column-content">Content<br /><small>Leave Blank To Use Highlighted</small></label>
        <textarea type="text" name="column-content" value="" id="column-content"></textarea>
    </div>
    <a href="javascript:ColumnDialog.insert(ColumnDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>