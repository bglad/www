<?php
add_action('admin_menu', 'about_menu_remove');
function about_menu_remove(){
	/* remove_submenu_page('brisk-mainmenu', 'sub-page42'); */
}
function add_about_menu(){

    /* must check that the user has the required capability */
    if (!current_user_can('manage_options'))
    {
		wp_die( __('You do not have sufficient permissions to access this page.', 'flowthemes') );
    }
?>
<div class="wrap">


<div class="welcome-panel" id="welcome-panel">
	<div style=" float: left; position: relative; width: 173px;">
		<img src="<?php bloginfo('template_directory'); ?>/screenshot.png" alt="" style="float: left; width: 173px;" />
		<p style="float: left; text-align: center; width: 100%;" class="description">
		<?php
			$my_theme = wp_get_theme();
			printf(__('%1$s is version %2$s', 'flowthemes'), $my_theme->Name, $my_theme->Version);
		?>
		</p>
	</div>

	<div class="welcome-panel-content">
	<h3><?php _e('Welcome to Daisho!', 'flowthemes'); ?></h3>
	<p class="about-description"><?php _e('You are running Daisho theme. If you need help getting started, check out our <a href="http://www.youtube.com/watch?v=Yvf2dcPfiHM" target="_blank">Installation Video (8:06)</a> and documentation on <a href="http://support.forcg.com/bb-templates/kakumei-flow/help/daisho/index.html#firstSteps" target="_blank">First Steps with Daisho</a>. If you’d rather dive right in, here are a few things most people do first when they set up a new Daisho site. If you need help, use the Daisho button in the top admin toolbar to get information on how to setup and use your website and where to go for more assistance.', 'flowthemes'); ?></p>
	<div class="welcome-panel-column-container">
	<div class="welcome-panel-column">
		<h4><span class="icon16 icon-settings"></span> <?php _e('Basic Settings', 'flowthemes'); ?></h4>
		<p><?php _e('When you first activated the theme we imported some demo settings to your database. Here is their raw list (one-to-one database match):', 'flowthemes'); ?></p>
<xmp style="white-space: pre-wrap; border: 1px solid #eee; padding: 3% 5%; background-color: #f8f8f8;">$theme_settings = array(
	'flowessencethemeactivated' => 1,
	'logo_type' => 'http://themes.devatic.com/daisho/wp-content/uploads/2012/05/logo.png',
	'tagline_disable' => '0',
	'custom_favicon' => 'http://themes.devatic.com/daisho/wp-content/uploads/2012/06/favicon.png',
	'portfolio_mode' => '0',
	'flow_featured_slideshow' => '0',
	'portfolio_recent' => '0',
	'blog_recent' => '0',
	'front_page' => '3232',
	'info_box' => '3393',
	'flow_portfolio_page' => '3433',
	'flow_blog_page' => '2482',
	'flow_homepage_shuffle_button' => '',
	'flow_wpml_switcher' => 0,
	'flow_wpml_left' => '170px',
	'flow_wpml_top' => '5px',
	'flow_portfolio_orderbymethod' => 0,
	'welcome_text' => 'Delivering immersive user experiences for the new media realm',
	'analytics_code' => '',
	'custom_css_style' => '',
	'blog_items_per_page' => '5',
	'blog_exclude_categories' => '',
	'footer_copyright' => 'C 2012 Daisho Systems. All Rights Reserved.',
	'footer_aff_link' => 'off',
	'footer_affiliate' => '',
	'footer_col_count' => '1',
	'footer_col_countcustom' => '',
	'footer_top_footer' => 'on',
	'bgchanger_color' => '#ffffff',
	'bgchanger_imgsrc' => '',
	'bgchanger_posx' => 'center',
	'bgchanger_posy' => 'top',
	'bgchanger_attach' => 'scroll',
	'bgchanger_repeat' => 'repeat',
);
</xmp>
	<p><?php _e('You can now modify them in Admin Panel in left sidebar under "Daisho". They all come from that area.', 'flowthemes'); ?></p>
	<?php
		$file = dirname(dirname(dirname(__FILE__))).'/image.php';
		$wantedPerms = 0744;
		$actualPerms = fileperms($file);
		/* Attempt to update image.php permission to 744
		if($actualPerms < $wantedPerms){
			chmod($file, $wantedPerms);
		} */

		$file = dirname(dirname(dirname(__FILE__))).'/imagecache';
		if(is_writable($file)){
			$cache_is_writable = __('Cache folder (/imagecache/) is <strong>writable</strong>.', 'flowthemes');
		}else{
			$cache_is_writable = __('Cache folder (/imagecache/) is <strong>not writable</strong>.', 'flowthemes');
		}
		
		$max_upload = ini_get('upload_max_filesize');
		$max_post = ini_get('post_max_size');
		$memory_limit = ini_get('memory_limit');
		$max_execution_time = ini_get('max_execution_time');
	?>
	<!-- <ul>
		<li><?php printf(__('Max Upload File Size Limit is set to <strong>%s</strong> - sets an upper limit on the size of uploaded files.', 'flowthemes'), $max_upload); ?></li>
		<li><?php printf(__('Max PHP POST Size Limit is set to <strong>%s</strong> - it limits the total size of posted data, including file data.', 'flowthemes'), $max_post); ?></li>
		<li><?php printf(__('PHP Memory Limit is set to <strong>%s</strong>.', 'flowthemes'), $memory_limit); ?></li>
		<li><?php printf(__('Max Execution Time is set to <strong>%s</strong>.', 'flowthemes'), $max_execution_time); ?></li>
		<li><?php printf(__('Image.php file permissions are set to: <strong>%s</strong> (minimum required is 0644)', 'flowthemes'), substr(decoct($actualPerms),2)); ?></li>
		<li><?php printf(__('Current PHP version: <strong>%s</strong>', 'flowthemes'), phpversion()); ?></li>
		<li><?php echo $cache_is_writable; ?></li>
	</ul>	 -->
	
<!-- 	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#form-restore-demo').on('submit', function(){
				return confirm("<?php //_e('Do you really want to remove all theme settings from database and import demo settings? This can not be undone.', 'flowthemes'); ?>");
			});
			jQuery('#form-delete-database').on('submit', function(){
				return confirm("<?php //_e('Do you really want to remove all theme settings from database? This can not be undone.', 'flowthemes'); ?>");
			});
		});
	</script> -->
<!-- <table>
	<tr>
		<td>
			<form id="form-restore-demo" name="form-restore-demo" method="post" action="">
				<input id="restore-demo" type="submit" name="Submit" class="button-primary" value="<?php //esc_attr_e('Restore Demo Settings', 'flowthemes') ?>" />
			</form>
		</td>
		<td><?php //_e('<strong>Restore Demo Settings</strong><p>You can restore demo settings by clicking this button. Please note that all theme settings will get erased - including Custom CSS Code and other settings that may be important to you. This can not be undone.</p>', 'flowthemes'); ?></td>
	</tr>
	<tr>
		<td>
			<form id="form-delete-database" name="form-delete-database" method="post" action="">
				<input type="submit" name="Submit" class="button-primary" value="<?php //esc_attr_e('Clean Database', 'flowthemes') ?>" />
			</form>
		</td>
		<td><?php //_e('<strong>Delete all theme settings from database</strong><p>When you deactivate theme, settings don\'t get removed - just in case you wanted to re-activate it. To permanently remove them please click this button. This can not be undone. Demo settings will import again once you re-activate the theme.</p>', 'flowthemes'); ?></td>
	</tr>
</table> -->
<!-- <p class="description"><?php //_e('Warning! All users with "manage_options" capability have access to these buttons - which is usually "Administrator", "Super Administrator" and nobody else (see <a href="http://codex.wordpress.org/Roles_and_Capabilities" target="_blank">WordPress - Roles and Capabilities</a>).', 'flowthemes'); ?></p> -->
</div>
	
	<div class="welcome-panel-column">
		<h4><span class="icon16 icon-page"></span> <?php _e('Add Real Content', 'flowthemes'); ?></h4>
		<p><?php _e('Check out sample pages, posts, portfolio projects and editors to see how it all works, then delete the default content and write your own!', 'flowthemes'); ?></p>
		<ul>
			<li><?php _e('<strong><a href="http://support.forcg.com/bb-templates/kakumei-flow/help/daisho/index.html#firstSteps" target="_blank">Import Demo Content</a></strong>', 'flowthemes'); ?></li>
			<!-- <li><?php //printf(__('View the <a href="%s/wp-admin/post.php?post=3889&action=edit" target="_blank">sample page</a> and <a href="%s/wp-admin/post.php?post=2771&action=edit" target="_blank">blog post</a>', 'flowthemes'), site_url(), site_url()); ?></li> -->
			<li><?php printf(__('View your <a href="%s/wp-admin/edit.php?post_type=page" target="_blank">pages</a> and <a href="%s/wp-admin/edit.php" target="_blank">blog posts</a>', 'flowthemes'), site_url(), site_url()); ?></li>
			<!-- <li><?php //printf(__('View the <a href="%s/wp-admin/post.php?post=2578&action=edit" target="_blank">sample portfolio project</a> and <a href="%s/wp-admin/post.php?post=3034&action=edit" target="_blank">slideshow slide</a>', 'flowthemes'), site_url(), site_url()); ?></li> -->
			<li><?php printf(__('View your <a href="%s/wp-admin/edit.php?post_type=portfolio" target="_blank">portfolio projects</a> and <a href="%s/wp-admin/edit.php?post_type=slideshow" target="_blank">slideshow slides</a>', 'flowthemes'), site_url(), site_url()); ?></li>			
			<li><?php _e('Go ahead and edit demo content or remove it and add your own!', 'flowthemes'); ?></a></li>
		</ul>
	</div>
	<div class="welcome-panel-column welcome-panel-last">
		<h4><span class="icon16 icon-appearance"></span> <?php _e('Customize Your Site', 'flowthemes'); ?></h4>
		<p><?php _e('Your current theme &mdash; Daisho &mdash; offers some customization options. Here are a few ways to make your site look unique.', 'flowthemes'); ?></p>			
		<ul>
			<li><a href="<?php echo site_url(); ?>/wp-admin/admin.php?page=sub-page41" target="_blank"><?php _e('Customize Background', 'flowthemes'); ?></a></li>
			<li><a href="http://support.forcg.com/bb-templates/kakumei-flow/help/daisho/index.html#typography" target="_blank"><?php _e('Customize Typography', 'flowthemes'); ?></a></li>
			<li><a href="<?php echo site_url(); ?>/wp-admin/widgets.php" target="_blank"><?php _e('Add some widgets', 'flowthemes'); ?></a></li>
			<li><a href="<?php echo site_url(); ?>/wp-admin/admin.php?page=brisk-mainmenu" target="_blank"><?php _e('Add Custom CSS Style', 'flowthemes'); ?></a></li>
		</ul>
		<p><?php _e('If you need more complex changes, our support forum is divided into two sections:', 'flowthemes'); ?></p>
		<table class="form-table">
			<tr><th><strong><?php _e('Free Support', 'flowthemes'); ?></strong></td><th><strong><?php _e('Paid Support', 'flowthemes'); ?></strong></td></tr>
			<tr><td><?php _e('Installation, configuration, general questions, bug reports, suggestions', 'flowthemes'); ?></td><td><a href="http://support.forcg.com/bb-templates/kakumei-flow/help/daisho/index.html#customModifications" target="_blank"><?php _e('Custom Modifications', 'flowthemes'); ?></a></td></tr>
			<tr><td><?php _e('Go ahead and let us know if you have any questions!', 'flowthemes'); ?></td><td><a href="http://support.forcg.com/forum/hire-developer" target="_blank"><?php _e('Find developer</a> to configure website for you or do custom modifications!', 'flowthemes'); ?></td></tr>
		</table>
	</div>
	</div>
	</div>
	</div>

</div>
<?php } ?>