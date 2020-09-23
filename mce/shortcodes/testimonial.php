<?php
// this file contains the contents of the popup window

/* FindWPConfig - searching for a root of wp */
function FindWPConfig($directory){
	global $confroot;
	foreach(glob($directory."/*") as $f){
		if (basename($f) == 'wp-config.php' ){
			$confroot = str_replace("\\", "/", dirname($f));
			return true;
		}
		if (is_dir($f)){
		$newdir = dirname(dirname($f));
		}
	}
	if (isset($newdir) && $newdir != $directory){
		if (FindWPConfig($newdir)){
			return false;
		}	
	}
	return false;
}
if (!isset($table_prefix)){
	global $confroot;
	FindWPConfig(dirname(dirname(__FILE__)));
	include_once $confroot."/wp-load.php";

}
?>
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
		var testimonial = jQuery('select#testimonial').val();
		 
		var output = '';
		
		// setup the output of our shortcode
		output = '[testimonial id=' + testimonial + ']';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);
</script>

<form action="/" method="get" accept-charset="utf-8">

    <div class="form-section clearfix">
        <label for="testimonial">Select A Testimonial</label>
        <select name="testimonial" id="testimonial" size="1">
			<?php
				global $post;
				$args = array(
					'post_type' =>'testimonials',
					'numberposts' => '-1'
				);
				$testimonials = get_posts($args);
			
				$count=0;
				foreach($testimonials as $post) : setup_postdata($post);
				$count++;
            ?>
        	<?php if($count == 1) { ?>
            	<option value="<?php echo $post->ID; ?>" selected="selected"><?php the_title(); ?></option>
            <?php } else { ?>
            	<option value="<?php echo $post->ID; ?>"><?php the_title(); ?></option>
            <?php } ?>
        	<?php endforeach; wp_reset_postdata(); ?>
        </select>
    </div>
    
    <a href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
</form>