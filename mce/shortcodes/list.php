<script type="text/javascript">
var ListDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ListDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertList(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var type = jQuery('select#list-type').val();
		 
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		
		// setup the output of our shortcode
		var output = '';
		
		output = '[list ';
		output += 'type=' + type + ' ';

		//insert shortcode around selected list
		if(mceSelected) {
			output += ']' + mceSelected + '[/list]';
		}
		
		else {
			
		//insert dummy content
			output += ']<ul><li>Sample Item 1</li><li>Sample Item 2</li><li>Sample Item 3</li></ul>[/list]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ListDialog.init, ListDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
	<div class="form-section clearfix">
        <label for="list-type">Type</label>
        <select name="list-type" id="list-type" size="1">
        	<option value="check" selected="selected">Check</option>
            <option value="bullets-black">Black</option>
            <option value="bullets-blue">Blue</option>
            <option value="bullets-gray">Gray</option>
            <option value="bullets-purple">Purple</option>
            <option value="bullets-red">Red</option>
        </select>
    </div>
	<a href="javascript:ListDialog.insert(ListDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>