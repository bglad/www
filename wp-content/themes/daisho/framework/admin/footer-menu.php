<?php 
// mt_settings_page() displays the page content for the Test settings submenu
function add_footer_menu(){

    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.', 'flowthemes') );
    }

    // variables for the field and option names
	$hidden_field_name = 'mt_submit_hidden';
	
    $opt_name = 'analytics_code';
    $data_field_name = 'analytics_code'; 
	$opt_name2 = 'footer_copyright';
    $data_field_name2 = 'footer_copyright';
	$opt_name3 = 'footer_col_count';
    $data_field_name3 = 'footer_col_count';
	$opt_name32 = 'footer_col_countcustom';
    $data_field_name32 = 'footer_col_countcustom';
	$opt_name4 = 'footer_aff_link';
    $data_field_name4 = 'footer_aff_link';
	$opt_name5 = 'footer_affiliate';
    $data_field_name5 = 'footer_affiliate';
	$opt_name6 = 'footer_top_footer';
    $data_field_name6 = 'footer_top_footer';


    // Read in existing option value from database
    $opt_val = stripslashes(get_option( $opt_name ));
    $opt_val2 = get_option( $opt_name2 );
    $opt_val3 = get_option( $opt_name3 );
    $opt_val32 = get_option( $opt_name32 );
    $opt_val4 = get_option( $opt_name4 );
    $opt_val5 = get_option( $opt_name5 );
    $opt_val6 = get_option( $opt_name6 );

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val = stripslashes($_POST[ $data_field_name ]);
        $opt_val2 = stripslashes($_POST[ $data_field_name2 ]);
        $opt_val3 = $_POST[ $data_field_name3 ];
        $opt_val32 = $_POST[ $data_field_name32 ];
        $opt_val4 = $_POST[ $data_field_name4 ];
        $opt_val5 = stripslashes($_POST[ $data_field_name5 ]);
        $opt_val6 = $_POST[ $data_field_name6 ];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );
        update_option( $opt_name2, $opt_val2 );
        update_option( $opt_name3, $opt_val3 );
        update_option( $opt_name32, $opt_val32 );
        update_option( $opt_name4, $opt_val4 );
        update_option( $opt_name5, $opt_val5 );
        update_option( $opt_name6, $opt_val6 );

        // Put an settings updated message on the screen

?>
<div class="updated"><p><strong><?php _e('Settings saved.', 'flowthemes' ); ?></strong></p></div>
<?php 

    }

    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'Footer Settings', 'flowthemes' ) . "</h2>";

    // settings form
    
    ?>



<form name="form-footer-analytics" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
    <table class="form-table">
        <tr valign="top">
        <th scope="row"><?php _e('Footer Copyright Notice', 'flowthemes'); ?></th>
        <td><textarea rows="6" cols="50" name="<?php echo $data_field_name2; ?>"><?php echo $opt_val2; ?></textarea><br/>
		<p><?php _e('You should paste here your copyright notice.<br/>(e.g. Copyright &copy; 2010 YourCompanyName. All rights reserved.)<br/>(Optional: You may also put here any additional code that should appear at the bottom of your footer. It works with HTML, too.).', 'flowthemes'); ?></p>
		</td>
        </tr>
	
		<tr><th><?php _e('Disable right footer', 'flowthemes'); ?></th><td>
		<input type="checkbox" name="<?php echo $data_field_name4; ?>"<?php if($opt_val4){ print(" checked=\"checked\""); } ?>>
		<br/>
		<p><?php _e('Choose if you\'d like to display right part of the footer or not. This part of the footer contains affiliate link that will make you some money.', 'flowthemes'); ?></p>
		</td></tr>
		
		<tr><th><?php _e('Custom affiliate link', 'flowthemes'); ?></th><td><input type="text" name="<?php echo $data_field_name5; ?>"<?php if($opt_val5){ print(" value=\"".$opt_val5."\""); } ?>>
		<br/>
		<p><?php _e('Put here your affiliate link to Themeforest item page or some other affiliate link. This way you will start making money with no efford.<br/>Example link may look like this: http://themeforest.net/item/brisk-business-blog-portfolio-wordpress-theme/240358?ref=Flow where you will have to replace Flow with your Themeforest username. If you leave this field blank it will link to our blog which is much appreciated (of course you can disable it anytime and it is not required).', 'flowthemes'); ?></p>
		</td></tr>
	
		<tr valign="top">
        <th scope="row"><?php _e('Footer columns', 'flowthemes'); ?></th>
        <td>
			<select name="<?php echo $data_field_name3; ?>">
				<option value="1"<?php if($opt_val3 == "1"){ print(" selected=\"selected\""); } ?>><?php _e('One Column', 'flowthemes'); ?></option>
				<option value="2"<?php if($opt_val3 == "2"){ print(" selected=\"selected\""); } ?>><?php _e('Two Columns (50%|50%)', 'flowthemes'); ?></option>
				<option value="3"<?php if($opt_val3 == "3"){ print(" selected=\"selected\""); } ?>><?php _e('Three Columns (33%|33%|33%)', 'flowthemes'); ?></option>
				<option value="31"<?php if($opt_val3 == "31"){ print(" selected=\"selected\""); } ?>><?php _e('Three Columns (50%|25%|25%)', 'flowthemes'); ?></option>
				<option value="32"<?php if($opt_val3 == "32"){ print(" selected=\"selected\""); } ?>><?php _e('Three Columns (25%|25%|50%)', 'flowthemes'); ?></option>
				<option value="4"<?php if($opt_val3 == "4"){ print(" selected=\"selected\""); } ?>><?php _e('Four Columns (25%|25%|25%|25%)', 'flowthemes'); ?></option>
				<option value="5"<?php if($opt_val3 == "5"){ print(" selected=\"selected\""); } ?>><?php _e('Five Columns (25%|16%|16%|16%|25%)', 'flowthemes'); ?></option>
				<option value="0"<?php if($opt_val3 == "0"){ print(" selected=\"selected\""); } ?>><?php _e('Disabled', 'flowthemes'); ?></option>
			</select><br/>
			<p><?php _e('Select how many columns would you like your footer to consist of and then go to [Appearance > Widgets] to populate them.<br/> Please note that some widgets may not fit narrow columns.<br/>For instance if you\'d like to use contact form in footer you\'ll have to use wider column.', 'flowthemes'); ?></p>
		</td>
        </tr><tr valign="top">
        <th scope="row"><?php _e('Custom footer columns', 'flowthemes'); ?></th>
        <td>
		<input type="text" name="<?php echo $data_field_name32; ?>"<?php if($opt_val32){ print(" value=\"".$opt_val32."\""); } ?>><br/>
		<p><?php _e('If you need custom footer columns layout rather than one of above then you can create it here.<br/>Put some numbers in the field above that symbolise different column widths and separate them by commas. Their sum should be equal to 12.<br/>For instance if you\'d like to create 4 equal columns (25% each) you would use: 3,3,3,3. To create 3 columns (33% each) you would use 4,4,4. Each column is 8.(3)% wide. Maximum number you can use is 12 (100%) and minimum is 1.', 'flowthemes'); ?></p>
		</td>
        </tr>
	
		<tr>
			<th><?php _e('Enable/disable top footer', 'flowthemes'); ?></th>
			<td>
				<input type="checkbox" name="<?php echo $data_field_name6; ?>"<?php if($opt_val6){ print(" checked=\"checked\""); } ?>><br/>
				<p><?php _e('You can enable or disable top part of the footer here. By default it contains logo.', 'flowthemes'); ?></p>
			</td>
		</tr>
	</table>
	
    <p class="submit">
    <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes', 'flowthemes') ?>" />
    </p>

</form>
</div>
<?php } ?>