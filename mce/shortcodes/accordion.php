<script type="text/javascript">
var AccordionDialog = {
	local_ed : 'ed',
	init : function(ed) {
		AccordionDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertAccordion(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var wrap = jQuery('select#accordion-wrap').val();
		var title = jQuery('input#accordion-title').val();
		var content = jQuery('textarea#accordion-content').val();
		 
		 
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		var output = '';
		
		// setup the output of our shortcode
		output = '&nbsp;';
		
		if(wrap == 'yes') {
			output += '[accordion]';
		}
		
				output += '[accordion_section title=\"';
				if(title){
					output += title+'\"';
				} else {
					output += 'Sample Title\"';
				}
				
				if(content) {	
					output += ']'+ content;
				}
				else {
					output += ']' + mceSelected;
				}
					
				output += '[/accordion_section]';
		
		if(wrap == 'yes') {
			output += '[/accordion]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(AccordionDialog.init, AccordionDialog);
</script>
<form action="/" method="get" accept-charset="utf-8">
        <div class="form-section clearfix">
            <label for="accordion-wrap">New Accordion</label>
            <select name="accordion-wrap" id="accordion-wrap" size="1">
                <option value="no" selected="selected">No</option>
                <option value="yes">Yes</option>
            </select>
        </div>
        <div class="form-section clearfix">
            <label for="accordion-title">Section Title</label>
            <input type="text" name="accordion-title" value="" id="accordion-title" />
        </div>
        <div class="form-section clearfix">
            <label for="accordion-content">Section Content<br /><small>Leave Blank To Use Highlighted</small></label>
            <textarea type="text" name="accordion-content" value="" id="accordion-content"></textarea>
        </div>
    
    <a href="javascript:AccordionDialog.insert(AccordionDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
    
</form>