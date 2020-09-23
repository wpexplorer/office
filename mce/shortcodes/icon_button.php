<script type="text/javascript">
var IconButtonDialog = {
	local_ed : 'ed',
	init : function(ed) {
		IconButtonDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertIconButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		 
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		
		// set up variables to contain our input values
		var url = jQuery('input#icon_button-url').val();
		var text = jQuery('input#icon_button-text').val();
		var type = jQuery('select#icon_button-type').val(); 
		 
		var output = '';
		
		// setup the output of our shortcode
		output = '&nbsp;';
		output += '[icon_button ';
		output += 'type=' + type + ' ';
		output += ' url=' + url;
		
		//insert text
		if(text) {	
			output += ']'+ text + '[/icon_button]';
		}
		else {
			
		// if it is blank, use selected content
			output += ']' + mceSelected + '[/icon_button]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(IconButtonDialog.init, IconButtonDialog);
 
</script>
<form action="/" method="get" accept-charset="utf-8">
    <div class="form-section clearfix">
        <label for="icon_button-url">URL</label>
        <input type="text" name="icon_button-url" value="" id="icon_button-url" />
    </div>
    <div class="form-section clearfix">
        <label for="icon_button-text">Text</label>
        <input type="text" name="icon_button-text" value="" id="icon_button-text" />
    </div>
    <div class="form-section clearfix">
        <label for="icon_button-type">Type</label>
        <select name="icon_button-type" id="icon_button-type" size="1">
            <option value="arrowup" selected="selected">Arrow Up</option>
            <option value="arrowdown">Arrow Down</option>
            <option value="arrowleft">Arrow Left</option>
            <option value="arrowright">Arrow Right</option>
            <option value="approve">Approve</option>
            <option value="add">Add</option>
            <option value="remove">Remove</option>
            <option value="log">Log</option>
            <option value="calendar">Calendar</option>
            <option value="search">Search</option>
            <option value="mail">Mail</option>
            <option value="move">Move</option>
            <option value="edit">Edit</option>
            <option value="pin">Pin</option>
            <option value="reload">Reload</option>
            <option value="rss">Rss</option>
            <option value="tag">Tag</option>
            <option value="user">User</option>
            <option value="loop">Loop</option>
            <option value="settings">Settings</option>
            <option value="comment">Comment</option>
            <option value="fork">Fork</option>
            <option value="like">Like</option>
            <option value="favorite">Favorite</option>
            <option value="home">Home</option>
            <option value="key">Key</option>
            <option value="lock">Lock</option>
            <option value="unlock">Unlock</option>
        </select>
    </div>
    <a href="javascript:IconButtonDialog.insert(IconButtonDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>