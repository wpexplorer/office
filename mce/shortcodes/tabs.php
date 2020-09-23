<script type="text/javascript">
var TabsDialog = {
	local_ed : 'ed',
	init : function(ed) {
		TabsDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertTabs(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var wrap = jQuery('select#tabs-wrap').val();
		var tab_headings = jQuery('input#tabs-headings').val();
		var set = jQuery('input#tabs-set').val();
		
		var tabsSet = jQuery('input#tabs-tabsSet').val();
		var position = jQuery('input#tabs-position').val();
		var content = jQuery('textarea#tabs-content').val();
		 
		 
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		var output = '';
		
		// setup the output of our shortcode
		output = '&nbsp;';
		
		if(wrap == 'yes') {
			output += '[tabgroup set='+set+' titles=\" '+ tab_headings +'\"]';
		}
		
				output += '[tab position='+position+' set=\"'+tabsSet+'\"';
				
				if(content) {	
					output += ']'+ content;
				}
				else {
					output += ']' + mceSelected;
				}
					
				output += '[/tab]';
		
		if(wrap == 'yes') {
			output += '[/tabgroup]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(TabsDialog.init, TabsDialog);
</script>
<form action="/" method="get" accept-charset="utf-8">
        <div class="form-section clearfix">
            <label for="tabs-wrap">New Tab Group?</label>
            <select name="tabs-wrap" id="tabs-wrap" size="1">
                <option value="no" selected="selected">No</option>
                <option value="yes">Yes</option>
            </select>
        </div>
		<div class="form-section clearfix">
            <label for="tabs-headings">Headings<br /><small>Seperated by a comma. Example: Title 1, Title 2, Title 3.</small></label>
            <input type="text" name="tabs-headings" value="" id="tabs-headings" />
        </div>
		<div class="form-section clearfix">
            <label for="tabs-set">Tab Group Set<br /><small>Give your tabs a unique identifier. Example: about-tabs</small></label>
            <input type="text" name="tabs-set" value="" id="tabs-set" />
        </div>
        
        <hr />
        
        <div class="form-section clearfix">
            <label for="tabs-tabsSet">Sample Tab<br/><small>Match with the tabgroup set</small></label>
            <input type="text" name="tabs-tabsSet" value="" id="tabs-tabsSet" />
        </div>
		<div class="form-section clearfix">
            <label for="tabs-position">Sample Tab Position<br /><smal>Match with your tab headings using numbers. Example: 1 would be the first tab and 2 would be the second tab.</label>
            <input type="text" name="tabs-position" value="" id="tabs-position" />
        </div>
        <div class="form-section clearfix">
            <label for="tabs-content">Sample Tab Content<br /><small>Leave Blank To Use Highlighted</small></label>
            <textarea type="text" name="tabs-content" value="" id="tabs-content"></textarea>
        </div>
    
    <a href="javascript:TabsDialog.insert(TabsDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
    
</form>