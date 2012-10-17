<?php 
// mt_settings_page() displays the page content for the Test settings submenu
function add_slideshow_menu() {

    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }

    // variables for the field and option names
	$hidden_field_name = 'mt_submit_hidden';
	
    $opt_name = 'slideshow_exclude_categories';
    $data_field_name = 'slideshow_exclude_categories';
	$opt_name2 = 'slideshow_items_per_page';
    $data_field_name2 = 'slideshow_items_per_page';

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );
	$opt_val2 = get_option( $opt_name2 );
	
    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val = $_POST[ $data_field_name ];
        $opt_val2 = $_POST[ $data_field_name2 ];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );
        update_option( $opt_name2, $opt_val2 );

        // Put an settings updated message on the screen

?>
<div class="updated"><p><strong><?php _e('Settings saved.', 'flowthemes' ); ?></strong></p></div>
<?php } ?>
<div class="wrap">
	<h2><?php _e( 'Slideshow Settings', 'flowthemes' ); ?></h2>
	<form name="form-main-page" method="post" action="">
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php _e('Slideshow Example Title', 'flowthemes'); ?></th>
				<td>
					<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>"></input>
					<p><?php _e('Slideshow Example Description', 'flowthemes'); ?></p>
				</td>
			</tr>
		</table>
		<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
		<p class="submit">
			<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
		</p>
	</form>
</div>
<?php } ?>