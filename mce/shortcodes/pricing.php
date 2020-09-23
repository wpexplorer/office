<script type="text/javascript">
var PricingDialog = {
	local_ed : 'ed',
	init : function(ed) {
		PricingDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertPricing(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var wrap = jQuery('select#pricing-wrap').val();
		
		var column = jQuery('select#pricing-column').val();
		var featured = jQuery('select#pricing-featured').val();
		var title = jQuery('input#pricing-title').val();
		var price = jQuery('input#pricing-price').val();
		var button_url = jQuery('input#pricing-button_url').val();
		var button_text = jQuery('input#pricing-button_text').val();
		var content = jQuery('textarea#pricing-content').val();
		 
		 
		 //set defaults
		 if(title == '') { title = 'Sample Text'} 
		 if(button_text == '') { button_text = 'Sample Text'} 
		 if(price == '') { price = '$100/month'}
		 
		//set highlighted content variable
		var mceSelected = tinyMCE.activeEditor.selection.getContent();
		var output = '';
		
		// setup the output of our shortcode
		output = '&nbsp;';
		
		if(wrap == 'yes') {
			output += '[pricing_table]';
		}
		
				output += '[pricing column='+column+' featured=\"'+featured+'\" title=\"'+title+'\" price=\"'+price+'\" button_url=\"'+button_url+'\" button_text=\"'+button_text+'\" ';
				
				if(content) {	
					output += ']'+ content;
				}
				else {
					output += ']' + mceSelected;
				}
					
				output += '[/pricing]';
		
		if(wrap == 'yes') {
			output += '[/pricing_table]';
		}
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(PricingDialog.init, PricingDialog);
</script>
<form action="/" method="get" accept-charset="utf-8">

        <div class="form-section clearfix">
            <label for="pricing-wrap">New Pricing</label>
            <select name="pricing-wrap" id="pricing-wrap" size="1">
                <option value="no" selected="selected">No</option>
                <option value="yes">Yes</option>
            </select>
        </div>
        
        <hr />
        
		<div class="form-section clearfix">
            <label for="pricing-column">Column Size</label>
            <select name="pricing-column" id="pricing-column" size="1">
                <option value="3" selected="selected">1/3</option>
                <option value="4">1/4</option>
                <option value="5">1/5</option>
            </select>
        </div>
        
		<div class="form-section clearfix">
            <label for="pricing-featured">Featured?</label>
            <select name="pricing-featured" id="pricing-featured" size="1">
                <option value="no" selected="selected">No</option>
                <option value="yes">Yes</option>
            </select>
        </div>
        
        <div class="form-section clearfix">
            <label for="pricing-title">Section Title</label>
            <input type="text" name="pricing-title" value="" id="pricing-title" />
        </div>
		<div class="form-section clearfix">
            <label for="pricing-price">Price</label>
            <input type="text" name="pricing-price" value="" id="pricing-price" />
        </div>
		<div class="form-section clearfix">
            <label for="pricing-button_url">Button URL</label>
            <input type="text" name="pricing-button_url" value="" id="pricing-button_url" />
        </div>
		<div class="form-section clearfix">
            <label for="pricing-button_text">Button Text</label>
            <input type="text" name="pricing-button_text" value="" id="pricing-button_text" />
        </div>
        <div class="form-section clearfix">
            <label for="pricing-content">Section Content<br /><small>Leave Blank To Use Highlighted. Otherwise use HTML to create your List.</small></label>
            <textarea type="text" name="pricing-content" value="" id="pricing-content"></textarea>
        </div>
    
    <a href="javascript:PricingDialog.insert(PricingDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
    
</form>