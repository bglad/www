<?php 
function add_main_menu2(){

    //must check that the user has the required capability 
    if(!current_user_can('manage_options')){
		wp_die(__('You do not have sufficient permissions to access this page.', 'flowthemes'));
    }

    // variables for the field and option names 
	$hidden_field_name = 'mt_submit_hidden';
	
    $opt_name = 'website_style';
    $data_field_name = 'website_style'; 
	$opt_name2 = 'custom_css_style';
    $data_field_name2 = 'custom_css_style';
	$opt_name3 = 'custom_favicon';
    $data_field_name3 = 'custom_favicon';	
	$opt_name4 = 'welcome_text';
    $data_field_name4 = 'welcome_text';	
	$opt_name5 = 'portfolio_mode';
    $data_field_name5 = 'portfolio_mode';
	$opt_name6 = 'logo_type';
    $data_field_name6 = 'logo_type';
	$opt_name7 = 'portfolio_recent';
    $data_field_name7 = 'portfolio_recent';
	$opt_name8 = 'blog_recent';
    $data_field_name8 = 'blog_recent';
	$opt_name9 = 'tagline_disable';
    $data_field_name9 = 'tagline_disable';
	$opt_name10 = 'info_box';
    $data_field_name10 = 'info_box';
	$opt_name11 = "analytics_code";
	$data_field_name11= "analytics_code";
	$opt_name12 = 'front_page';
    $data_field_name12 = 'front_page';
	$opt_name13 = 'flow_portfolio_page';
    $data_field_name13 = 'flow_portfolio_page';
	$opt_name14 = 'flow_blog_page';
    $data_field_name14 = 'flow_blog_page';	
	$opt_name15 = 'flow_homepage_shuffle_button';
    $data_field_name15 = 'flow_homepage_shuffle_button';
	$opt_name16 = 'flow_testimonials';
    $data_field_name16 = 'flow_testimonials';
	$opt_name17 = 'flow_portfolio_hover_type';
    $data_field_name17 = 'flow_portfolio_hover_type';
	$opt_name18 = 'flow_portfolio_fixed_menu';
    $data_field_name18 = 'flow_portfolio_fixed_menu';
	$opt_name19 = 'flow_portfolio_orderbymethod';
    $data_field_name19 = 'flow_portfolio_orderbymethod';
	$opt_name21 = 'flow_featured_slideshow';
    $data_field_name21 = 'flow_featured_slideshow';
	
	$opt_name22 = 'flow_wpml_switcher';
    $data_field_name22 = 'flow_wpml_switcher';
	$opt_name23 = 'flow_wpml_left';
    $data_field_name23 = 'flow_wpml_left';
	$opt_name24 = 'flow_wpml_top';
    $data_field_name24 = 'flow_wpml_top';	
	
	$opt_name25 = 'flow_portfolio_home_exclude';
    $data_field_name25 = 'flow_portfolio_home_exclude';
	
    // Read in existing option value from database
    $opt_val = get_option( $opt_name );
	$opt_val2 = get_option( $opt_name2 );
	$opt_val3 = get_option( $opt_name3 );
	$opt_val4 = get_option( $opt_name4 );
	$opt_val5 = get_option( $opt_name5 );
	$opt_val6 = get_option( $opt_name6 );
	$opt_val7 = get_option( $opt_name7 );
	$opt_val8 = get_option( $opt_name8 );
	$opt_val9 = get_option( $opt_name9 );
	$opt_val10 = get_option( $opt_name10 );
	$opt_val11 = get_option( $opt_name11 );
	$opt_val12 = get_option( $opt_name12 );
	$opt_val13 = get_option( $opt_name13 );
	$opt_val14 = get_option( $opt_name14 );
	$opt_val15 = get_option( $opt_name15 );
	$opt_val16 = get_option( $opt_name16 );
	$opt_val17 = get_option( $opt_name17 );
	$opt_val18 = get_option( $opt_name18 );
	$opt_val19 = get_option( $opt_name19 );
	$opt_val21 = get_option( $opt_name21 );
	
	$opt_val22 = get_option( $opt_name22 );
	$opt_val23 = get_option( $opt_name23 );
	$opt_val24 = get_option( $opt_name24 );
	
	$opt_val25 = get_option( $opt_name25 );
	
    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val = $_POST[ $data_field_name ];
        $opt_val2 = $_POST[ $data_field_name2 ];
        $opt_val3 = $_POST[ $data_field_name3 ];
        $opt_val4 = $_POST[ $data_field_name4 ];
        $opt_val5 = $_POST[ $data_field_name5 ];
        $opt_val6 = $_POST[ $data_field_name6 ];
        $opt_val7 = $_POST[ $data_field_name7 ];
        $opt_val8 = $_POST[ $data_field_name8 ];
        $opt_val9 = $_POST[ $data_field_name9 ];
        $opt_val10 = $_POST[ $data_field_name10 ];
        $opt_val11 = $_POST[ $data_field_name11 ];
        $opt_val12 = $_POST[ $data_field_name12 ];
        $opt_val13 = $_POST[ $data_field_name13 ];
        $opt_val14 = $_POST[ $data_field_name14 ];
        $opt_val15 = $_POST[ $data_field_name15 ];
        $opt_val16 = $_POST[ $data_field_name16 ];
        $opt_val17 = $_POST[ $data_field_name17 ];
        $opt_val18 = $_POST[ $data_field_name18 ];
        $opt_val19 = $_POST[ $data_field_name19 ];
        $opt_val21 = $_POST[ $data_field_name21 ];
		
        $opt_val22 = $_POST[ $data_field_name22 ];
        $opt_val23 = $_POST[ $data_field_name23 ];
        $opt_val24 = $_POST[ $data_field_name24 ];
		
        $opt_val25 = $_POST[ $data_field_name25 ];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );
        update_option( $opt_name2, $opt_val2 );
        update_option( $opt_name3, $opt_val3 );
        update_option( $opt_name4, $opt_val4 );
        update_option( $opt_name5, $opt_val5 );
        update_option( $opt_name6, $opt_val6 );
        update_option( $opt_name7, $opt_val7 );
        update_option( $opt_name8, $opt_val8 );
        update_option( $opt_name9, $opt_val9 );
        update_option( $opt_name10, $opt_val10 );
        update_option( $opt_name11, $opt_val11 );
        update_option( $opt_name12, $opt_val12 );
        update_option( $opt_name13, $opt_val13 );
        update_option( $opt_name14, $opt_val14 );
        update_option( $opt_name15, $opt_val15 );
        update_option( $opt_name16, $opt_val16 );
        update_option( $opt_name17, $opt_val17 );
        update_option( $opt_name18, $opt_val18 );
        update_option( $opt_name19, $opt_val19 );
        update_option( $opt_name21, $opt_val21 );
		
        update_option( $opt_name22, $opt_val22 );
        update_option( $opt_name23, $opt_val23 );
        update_option( $opt_name24, $opt_val24 );
		
        update_option( $opt_name25, $opt_val25 );

        // Put an settings updated message on the screen
?>
<div class="updated"><p><strong><?php _e('Settings Saved', 'flowthemes' ); ?></strong></p></div>
<?php } ?>
<div class="wrap">
	<h2><?php _e('General Settings', 'flowthemes'); ?></h2>
	<form name="form-main-page" method="post" action="">
    <table class="form-table">
        <tr valign="top">
        <th scope="row"><?php _e('Logo', 'flowthemes'); ?></th>
		<td><input type="text" name="<?php echo $data_field_name6; ?>" value="<?php echo $opt_val6; ?>"></input><span href="#" title="" class="briskuploader button">Upload</span><br/><div class="briskuploader_preview"></div>
		<p><?php _e('WordPress will display text logo and tagline unless you put a link to image logo here. Text logo and tagline can be modified in Settings > General. Once you put here a link to some image the text logo as well as tagline will be replaced with it.', 'flowthemes'); ?></p>
		</td>
        </tr>
		
		<tr valign="top">
        <th scope="row"><?php _e('Tagline', 'flowthemes'); ?></th>
		<td><?php 	if($opt_val9 == "1"){
			$first9 = 'selected="selected"';
		}else{
			$zero9 = 'selected="selected"';
		}
		?><select name="<?php echo $data_field_name9; ?>">
		<option value="0" <?php echo $zero9; ?>><?php _e('Show tagline', 'flowthemes'); ?></option>
		<option value="1" <?php echo $first9; ?>><?php _e('Disable tagline', 'flowthemes'); ?></option>
		</select>
		<p><?php _e('You can enable or disable logo tagline here.', 'flowthemes'); ?></p>
		</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><?php _e('Favicon', 'flowthemes'); ?></th>
			<td><input type="text" name="<?php echo $data_field_name3; ?>" value="<?php echo $opt_val3; ?>"></input><span href="#" title="" class="briskuploader button"><?php _e('Upload', 'flowthemes'); ?></span><br/><div class="briskuploader_preview"></div><p><?php _e('Upload your favicon here.', 'flowthemes'); ?></p>
			</td>
        </tr>
		
		<!--<tr valign="top">
        <th scope="row">Style</th>
			<td><?php //if($opt_val == "1"){
			//	$first = 'selected="selected"';
			//}else{
			//	$zero = 'selected="selected"';
			//}
			?><select name="<?php //echo $data_field_name; ?>">
			<option value="0" <?php //echo $zero; ?>>Dark</option>
			<option value="1" <?php //echo $first; ?>>Light</option>
			</select><p>Pick light or dark website style (light is experimental, beta!).</p>
			</td>
		</tr>-->

		<tr valign="top">
        <th scope="row"><?php _e('Homepage Mode', 'flowthemes'); ?></th>
			<td><?php if($opt_val5 == "1"){
				$first5 = 'selected="selected"';
			}else{
				$zero5 = 'selected="selected"';
			}
			?><select name="<?php echo $data_field_name5; ?>">
			<option value="0" <?php echo $zero5; ?>><?php _e('Classic', 'flowthemes'); ?></option>
			<option value="1" <?php echo $first5; ?>><?php _e('Thumbnail grid', 'flowthemes'); ?></option>
			</select><p><?php _e('Pick homepage layout style here.', 'flowthemes'); ?></p>
			</td>
		</tr>

		<tr valign="top">
        <th scope="row"><?php _e('Frontpage slideshow', 'flowthemes'); ?></th>
			<td><?php if($opt_val21 == "1"){
				$first21 = 'selected="selected"';
			}else{
				$zero21 = 'selected="selected"';
			}
			?><select name="<?php echo $data_field_name21; ?>">
			<option value="0" <?php echo $zero21; ?>><?php _e('Enable', 'flowthemes'); ?></option>
			<option value="1" <?php echo $first21; ?>><?php _e('Disable', 'flowthemes'); ?></option>
			</select><p><?php _e('Slides are editable under [Slideshow > Add New]. Slideshow is displayed as "welcome" page before everything else.', 'flowthemes'); ?></p>
			</td>
		</tr>		
		
		<tr valign="top">
        <th scope="row"><?php _e('Frontpage recent portfolio entries', 'flowthemes'); ?></th>
			<td><?php if($opt_val7 == "1"){
				$first7 = 'selected="selected"';
			}else{
				$zero7 = 'selected="selected"';
			}
			?><select name="<?php echo $data_field_name7; ?>">
			<option value="0" <?php echo $zero7; ?>><?php _e('Enable', 'flowthemes'); ?></option>
			<option value="1" <?php echo $first7; ?>><?php _e('Disable', 'flowthemes'); ?></option>
			</select><p><?php _e('Choose if you\'d like to display frontpage recent portfolio entries or not.', 'flowthemes'); ?></p>
			</td>
		</tr>		
		
		<tr valign="top">
        <th scope="row"><?php _e('Frontpage recent blog entries', 'flowthemes'); ?></th>
			<td><?php if($opt_val8 == "1"){
				$first8 = 'selected="selected"';
			}else{
				$zero8 = 'selected="selected"';
			}
			?><select name="<?php echo $data_field_name8; ?>">
			<option value="0" <?php echo $zero8; ?>><?php _e('Enable', 'flowthemes'); ?></option>
			<option value="1" <?php echo $first8; ?>><?php _e('Disable', 'flowthemes'); ?></option>
			</select><p><?php _e('Choose if you\'d like to display frontpage recent blog entries or not.', 'flowthemes'); ?></p>
			</td>
		</tr>
		
        <tr valign="top">
        <th scope="row">Front Page</th>
        <td><select name="<?php echo $data_field_name12; ?>"><option value=""><?php _e('None', 'flowthemes'); ?></option><?php 
			$pages = get_pages();
			foreach ($pages as $pagg) {
				print("<option value=\"".$pagg->ID."\"".(($opt_val12==$pagg->ID)?" selected=\"selected\"":"").">".$pagg->post_title."</option>");
			}
		  ?></select><br/>
		<p><?php _e('Pick some page that will be displayed as front page.', 'flowthemes'); ?></p>
		</td>
        </tr>
		
		<tr valign="top">
        <th scope="row"><?php _e('Info Box Page', 'flowthemes'); ?></th>
        <td><select name="<?php echo $data_field_name10; ?>"><option value=""><?php _e('None', 'flowthemes'); ?></option><?php 
			$pages = get_pages();
			foreach ($pages as $pagg) {
				print("<option value=\"".$pagg->ID."\"".(($opt_val10==$pagg->ID)?" selected=\"selected\"":"").">".$pagg->post_title."</option>");
			}
		  ?></select><br/>
		<p><?php _e('Pick some page that will be displayed as front page.', 'flowthemes'); ?></p>
		</td>
        </tr>		
		
		<tr valign="top">
        <th scope="row">Portfolio Page</th>
        <td><select name="<?php echo $data_field_name13; ?>"><option value=""><?php _e('None', 'flowthemes'); ?></option><?php 
			$pages = get_pages();
			foreach ($pages as $pagg) {
				print("<option value=\"".$pagg->ID."\"".(($opt_val13==$pagg->ID)?" selected=\"selected\"":"").">".$pagg->post_title."</option>");
			}
		  ?></select><br/>
		<p><?php _e('Select your main portfolio page (used to setup permalinks such as "back" or "view portfolio").', 'flowthemes'); ?></p>
		</td>
        </tr>		
		
		<tr valign="top">
        <th scope="row"><?php _e('Blog Page', 'flowthemes'); ?></th>
        <td><select name="<?php echo $data_field_name14; ?>"><option value=""><?php _e('None', 'flowthemes'); ?></option><?php 
			$pages = get_pages();
			foreach ($pages as $pagg) {
				print("<option value=\"".$pagg->ID."\"".(($opt_val14==$pagg->ID)?" selected=\"selected\"":"").">".$pagg->post_title."</option>");
			}
		  ?></select><br/>
		<p><?php _e('Select your main blog page (used to setup permalinks such as "back" or "view blog").', 'flowthemes'); ?></p>
		</td>
        </tr>
		
        <!--<tr valign="top">
        <th scope="row">Thumbnails mouse rollover effect</th>
        <td>
		<?php 	//if($opt_val17 == "1"){
		//	$first17 = 'selected="selected"';
		//}else{
		//	$zero17 = 'selected="selected"';
		//}
		?>
		<select name="<?php //echo $data_field_name17; ?>">
			<option value="0" <?php //echo $zero17; ?>>Standard mouse over</option>
			<option value="1" <?php //echo $first17; ?>>Mouse over with color and description</option>
		</select>
		<p>Choose thumbnails mouse over effect.</p>
		</td>
		</tr>-->

		<!--<tr valign="top">
			<th scope="row">Top navigation mode</th>
			<td>
				<?php 	//if($opt_val18 == "1"){
					//$first18 = 'selected="selected"';
				//}else if($opt_val18 == "2"){
				//	$second18 = 'selected="selected"';
				//}else{
				//	$zero18 = 'selected="selected"';
				//}
				?>
				<select name="<?php //echo $data_field_name18; ?>">
					<option value="0" <?php //echo $zero18; ?>>Standard moving menu</option>
					<option value="1" <?php //echo $first18; ?>>Fixed menu (moving on project pages)</option>
					<option value="2" <?php //echo $second18; ?>>Fixed menu</option>
				</select>
				<p>Choose left menu mode (moving or fixed).</p>
			</td>
		</tr>-->

        <tr valign="top">
			<th scope="row"><?php _e('Shuffle Button on Front Page', 'flowthemes'); ?></th>
			<td>
				<?php $checked = null; if($opt_val15 == "1"){ $checked = 'checked'; } ?>
				<div class="checkbox">
					<input id="<?php echo $data_field_name15; ?>" name="<?php echo $data_field_name15; ?>" <?php echo $checked; ?> type="checkbox" value="1" />
					<label for="<?php echo $data_field_name15; ?>"><span></span></label>
				</div>
			</td>
		</tr>          
		
		<tr valign="top">
			<th scope="row"><?php _e('WPML Language Switcher (Header)', 'flowthemes'); ?></th>
			<td>
				<?php $checked = null; if($opt_val22 == "1"){ $checked = 'checked'; } ?>
				<div class="checkbox">
					<input id="<?php echo $data_field_name22; ?>" name="<?php echo $data_field_name22; ?>" <?php echo $checked; ?> type="checkbox" value="1" />
					<label for="<?php echo $data_field_name22; ?>"><span></span></label>
				</div>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><?php _e('WPML Language Switcher - Position Left', 'flowthemes'); ?></th>
			<td>
				<input type="text" name="<?php echo $data_field_name23; ?>" value="<?php echo stripslashes($opt_val23); ?>"><br/>
				<p><?php _e('Specify left margin for WPML language switcher in header here. It should be like: 150px or -200px or 10% or 50% etc. (CSS \'left\' is used).', 'flowthemes'); ?></p>
			</td>
        </tr>
		
		<tr valign="top">
			<th scope="row"><?php _e('WPML Language Switcher - Position Top', 'flowthemes'); ?></th>
			<td>
				<input type="text" name="<?php echo $data_field_name24; ?>" value="<?php echo stripslashes($opt_val24); ?>"><br/>
				<p><?php _e('Specify left margin for WPML language switcher in header here. It should be like: 5px or -10px or 2% or -5% etc. (CSS \'top\' is used - but positioning starts from exact vertical middle of header!).', 'flowthemes'); ?></p>
			</td>
        </tr>
		
		<tr valign="top">
			<th scope="row"><?php _e('Portfolio thumbnails order by', 'flowthemes'); ?></th>
			<td>
				<?php 	if($opt_val19 == "1"){
					$first19 = 'selected="selected"';
				}else{
					$zero19 = 'selected="selected"';
				}
				?>
				<select name="<?php echo $data_field_name19; ?>">
					<option value="0" <?php echo $zero19; ?>><?php _e('Date (recommended)', 'flowthemes'); ?></option>
					<option value="1" <?php echo $first19; ?>><?php _e('Random', 'flowthemes'); ?></option>
				</select>
			</td>
		</tr>
		
	<?php
		$page_portfolio_options = array();
		$page_portfolio_categories = get_terms("portfolio_category");
		for($h=0;$h<count($page_portfolio_categories);$h++){
			$page_portfolio_options[$page_portfolio_categories[$h]->slug] = $page_portfolio_categories[$h]->name;
		}
		$options = $page_portfolio_options;
		$value = $opt_val25;
	?>
	<tr>
		<th scope="row"><?php _e('Exclude Homepage Portfolio Categories', 'flowthemes'); ?></th>
		<td>
			<select multiple="multiple" name="<?php echo $data_field_name25; ?>[]">
			<?php foreach ($options as $optionkey => $optionval){ ?>
				<option value="<?php echo $optionkey; ?>" <?php if((is_array($value) && in_array($optionkey,$value)) || (is_string($value) && $optionkey == $value)) echo ' selected="selected"'; ?>><?php echo $optionval; ?></option>
			<?php } ?>
			</select>
		</td>
	</tr>
		
		<tr valign="top">
			<th scope="row"><?php _e('Homepage Welcome Text', 'flowthemes'); ?></th>
			<td>
				<textarea rows="6" cols="50" name="<?php echo $data_field_name4; ?>"><?php echo stripslashes($opt_val4); ?></textarea><br/>
				<p><?php _e('Put here homepage welcome text. Leave blank to skip it.', 'flowthemes'); ?></p>
			</td>
        </tr>
	
        <tr valign="top">
        <th scope="row"><?php _e('Tracking Code', 'flowthemes'); ?></th>
        <td><textarea rows="6" cols="50" name="<?php echo $data_field_name11; ?>"><?php echo stripslashes($opt_val11); ?></textarea><br/>
		<p><?php _e('Put Google Analytics code here to instantly start tracking your stats.<br/> (Optional: You may also put here any code that should appear just before &lt;/body&gt; tag).', 'flowthemes'); ?></p>
		</td>
        </tr>
		
		<tr valign="top">
        <th scope="row"><?php _e('Custom CSS Code', 'flowthemes'); ?></th>
        <td id="custom_css"><textarea id="custom_css_style" rows="6" cols="50" name="<?php echo $data_field_name2; ?>"><?php echo stripslashes($opt_val2); ?></textarea>
		<dl>
			<dt><?php _e('Put here your custom CSS code in addition to standard CSS code or overwrite existing CSS. The advantage of this field is that the code here will not get overwritten when you update theme! It will be stored in the database in "custom_css_style" custom field.', 'flowthemes'); ?></dt>
		</dl>
		<dl>
			<dt><?php _e('<a href="javascript:autoFormatSelection()">Autoformat Selected</a> - Select entire code and click this to clean it.', 'flowthemes'); ?></dt>
			<dt><?php _e('<a href="javascript:commentSelection(true)">Comment Selected</a> - Select a part of code and click this to comment it out.', 'flowthemes'); ?></dt>
			<dt><?php _e('<a href="javascript:commentSelection(false)">Uncomment Selected</a> - Select a part of commented out code and click this to uncomment.', 'flowthemes'); ?></dt>
		</dl>
		<dl>
			<?php _e('<dt>Matches Highlighter</dt><dd>Matches of selected text will highlight on select.</dd>', 'flowthemes'); ?>
			<?php _e('<dt>Ctrl-F / Cmd-F</dt><dd>Start searching</dd>', 'flowthemes'); ?>
			<?php _e('<dt>Ctrl-G / Cmd-G</dt><dd>Find next</dd>', 'flowthemes'); ?>
			<?php _e('<dt>Shift-Ctrl-G / Shift-Cmd-G</dt><dd>Find previous</dd>', 'flowthemes'); ?>
			<?php _e('<dt>Shift-Ctrl-F / Cmd-Option-F</dt><dd>Replace</dd>', 'flowthemes'); ?>
			<?php _e('<dt>Shift-Ctrl-R / Shift-Cmd-Option-F</dt><dd>Replace all</dd>', 'flowthemes'); ?>
			<?php _e('<dt>F11</dt><dd>Press F11 when cursor is in the editor to toggle full screen editing.</dd>', 'flowthemes'); ?>
			<?php _e('<dt>Esc</dt><dd>Esc can also be used to exit full screen editing.</dd>', 'flowthemes'); ?>
			<!-- <dt>Auto-close/complete</dt><dd>Type an html tag.  When you type '>' or '/', the tag will auto-close/complete.  Block-level tags will indent.</dd> -->
		</dl>
	
		</td>
        </tr>
	
       <!-- <tr valign="top">
        <th scope="row">Testimonials Widget</th>
        <td>
		<script type="text/javascript">
        //$(function() {
		jQuery(document).ready(function(){
            var i = jQuery('#flow_testimonials li').size() + 1;
            jQuery('a#add').click(function() {
                jQuery('<li>Testimonial ' + i + ': <input type="text" name="<?php //echo $data_field_name16; ?>[ ]"></li>').appendTo('ul#flow_testimonials');
                i++;
            });
            jQuery('a#remove').click(function() {
                jQuery('#flow_testimonials li:last').remove();
                if (i == 1) {
				
				} else {
                i--;
                } 
            });
			});
       // })();
		</script>
		<?php 
		//if($_POST['flow_testimonials'] != ''){
		//$testimonials = $_POST['flow_testimonials'];
		// Note that $testimonials will be an array.
	//	echo '<ul id="flow_testimonials">';
		//$i = 1;
		//foreach ($testimonials as $testimonial) { ?>
			<li>Testimonial <?php // echo $i; $i++; ?>: <input type="text" name="<?php //echo $data_field_name16; ?>[ ]" value="<?php //echo stripslashes($testimonial); ?>"></li>
		<?php //} ?>
		</ul>
		<?php //}else{
		//$i = 1;
		?>
		<ul id="flow_testimonials">
		<?php 
		//if(is_array($opt_val16)){
		//foreach($opt_val16 as $opt_val16_piece){ ?>
			<li>Testimonial <?php //echo $i; $i++; ?>: <input type="text" name="<?php //echo $data_field_name16; ?>[ ]" value="<?php //echo stripslashes($opt_val16_piece); ?>"></li>
		<?php //} 
		//} ?>
		</ul>
		<?php //} ?>
		<a href="#" onclick="javascript:return false;" id="add">Add testimonial field</a><br />
		<a href="#" onclick="javascript:return false;" id="remove">Remove testimonial field</a>
		<br/>
		<p>You can add testimonials to testimonials widget here. By using ^ separator you can separate testimonial text from quote author.<br />
		Example: <strong>This is some testimonial.^Flow</strong><br />
		In this case "This is some testimonial" will be displayed as quoted text and "Flow" will be its author.<br />
		You shouldn't leave any empty fields because they will be treated as blank testimonials. You should SAVE settings after you've done editing testimonials.</p>
		</td>
        </tr>-->
    </table> 

	<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
	<p class="submit">
    <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes', 'flowthemes') ?>" />
	</p>
</form>
<?php } ?>