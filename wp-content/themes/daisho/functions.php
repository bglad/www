<?php 
	require_once (TEMPLATEPATH . '/framework/admin/admin-menu.php');
	require_once (TEMPLATEPATH . '/framework/admin/shortcodes/shortcode-generator.php');
	require_once (TEMPLATEPATH . '/framework/admin/meta-boxes.php');
	require_once (TEMPLATEPATH . '/framework/admin/portfolio-post-type.php');
	require_once (TEMPLATEPATH . '/framework/admin/slideshow-post-type.php');
	require_once (TEMPLATEPATH . '/framework/admin/news-post-type.php');
	require_once (TEMPLATEPATH . '/framework/admin/sidebars-menu.php');
	require_once (TEMPLATEPATH . '/framework/admin/toolbar.php');

	require_once (TEMPLATEPATH . '/framework/miscellaneous/excerpt.php');
	require_once (TEMPLATEPATH . '/framework/miscellaneous/is_.php');
	require_once (TEMPLATEPATH . '/framework/miscellaneous/nav.php');
	require_once (TEMPLATEPATH . '/framework/miscellaneous/lang.php');
	require_once (TEMPLATEPATH . '/framework/miscellaneous/menus.php');
	require_once (TEMPLATEPATH . '/framework/miscellaneous/sidebars.php');
	require_once (TEMPLATEPATH . '/framework/miscellaneous/search.php');
	require_once (TEMPLATEPATH . '/framework/miscellaneous/comments.php');
	require_once (TEMPLATEPATH . '/framework/miscellaneous/usefulvariables.php');
	require_once (TEMPLATEPATH . '/framework/miscellaneous/hexdarker.php');
	
	require_once (TEMPLATEPATH . '/framework/shortcodes/konzept-dribbb/wp-dribbble.php'); 
	
	//require_once (TEMPLATEPATH . '/framework/admin/shortcodes/DI-shortcode_button.php'); //Module that adds "Add Shortcode" icon to admin panel. DISABLED
	require_once (TEMPLATEPATH . '/framework/admin/codemirror/codemirror.php'); 

	add_action('init', 'init_loadshortcodes');
	function init_loadshortcodes(){
		require_once (TEMPLATEPATH . '/framework/shortcodes/loader.php');
	}
	
	require_once (TEMPLATEPATH . '/framework/widgets/loader.php');
	


	add_action('init', 'my_init_method');
	add_action('wp_enqueue_scripts', 'my_scripts_method');
	add_action('admin_enqueue_scripts', 'my_wp_admin_scripts_method');
	add_action('widgets_init', 'unregister_default_wp_widgets', 1);

// unregister all default WP Widgets
function unregister_default_wp_widgets() {
    //unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    //unregister_widget('WP_Widget_Archives');
    //unregister_widget('WP_Widget_Links');
    //unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    //unregister_widget('WP_Widget_Text');
    //unregister_widget('WP_Widget_Categories');
    //unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    //unregister_widget('WP_Widget_Tag_Cloud');
}
	
function my_init_method(){
}

function my_scripts_method() {
    //if ( !is_admin() && !stristr( $_SERVER['REQUEST_URI'], 'wp-login' ) ) { // instruction to only load if it is not the admin area or wp-login.php file
	
	/* Scripts folder contains global scripts that are used in various modules */
	wp_register_script('jquery_easing_script', get_bloginfo('template_directory') . '/scripts/jquery.easing.1.3.js', array('jquery'), '1.3' );
	wp_register_script('mousewheel', get_bloginfo('template_directory') . '/scripts/mousewheel.js', array('jquery'), '1.0' );
	wp_register_script('cloud_carousel', get_bloginfo('template_directory') . '/scripts/cloud-carousel.1.0.5.min.js', array('jquery', 'mousewheel'), '1.0' );
	wp_register_script('jqtools_tooltip', get_bloginfo('template_directory') . '/scripts/jquery.tooltip.min.js', array('jquery'), '1.0' );
	wp_register_script('flow_top_navigation_script', get_bloginfo('template_directory') . '/scripts/flow.top.navigation-1.0.js', array('jquery'), '1.0' );
	wp_register_script('flow_prettyphoto_init', get_bloginfo('template_directory') . '/scripts/prettyPhoto-init.js', array('jquery'), '1.0' );
	
	wp_register_style('jquery-ui-smoothness-css', get_bloginfo('template_directory') . '/scripts/jquery-ui/css/smoothness/jquery-ui-1.8.22.custom.css', array(), '1.0' );
	
	
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core', false, array('jquery'), false, false);
	wp_enqueue_script('jquery-ui-widget', false, array('jquery'), false, false);
	wp_enqueue_script('jquery-ui-mouse', false, array('jquery'), false, false);
	wp_enqueue_script('jquery-ui-accordion', false, array('jquery'), false, false);
	//wp_enqueue_script('jquery-ui-slider', false, array('jquery'), false, false);
	wp_enqueue_script('jquery-ui-tabs', false, array('jquery'), false, false);
	//wp_enqueue_script('jquery-ui-sortable', false, array('jquery'), false, false);
	//wp_enqueue_script('jquery-ui-draggable', false, array('jquery'), false, false);
	//wp_enqueue_script('jquery-ui-droppable', false, array('jquery'), false, false);
	//wp_enqueue_script('jquery-ui-selectable', false, array('jquery'), false, false);
	//wp_enqueue_script('jquery-ui-datepicker', false, array('jquery'), false, false);
	//wp_enqueue_script('jquery-ui-resizable', false, array('jquery'), false, false);
	//wp_enqueue_script('jquery-ui-dialog', false, array('jquery'), false, false);
	//wp_enqueue_script('jquery-ui-button', false, array('jquery'), false, false);
	wp_enqueue_script('flow_prettyphoto_init', false, array('jquery'), false, true);
	//wp_enqueue_style('jquery-ui-smoothness-css');
	
	wp_enqueue_script('jquery_jcycle_script');
	wp_enqueue_script('jquery_easing_script');
	wp_enqueue_script('mousewheel');
	wp_enqueue_script('cloud_carousel');
	wp_enqueue_script('jqtools_tooltip');
	wp_enqueue_script('flow_top_navigation_script');
	if(is_singular()){
		wp_enqueue_script('comment-reply');
	}
	//}
}

function my_wp_admin_scripts_method(){
	wp_register_script( 'brisk-uploader', get_bloginfo( 'template_directory').'/scripts/brisk-uploader.js', array('jquery','thickbox'));
	
	/* colorpicker field in meta-boxes.php */
	wp_register_style( 'FlowTypographyStylesheet', get_bloginfo('template_directory') . '/framework/admin/colorpicker/style.css' );
	wp_register_style( 'FlowTypographyMainStylesheet', get_bloginfo('template_directory') . '/framework/admin/colorpicker/css/colorpicker.css' );
	wp_register_style( 'FlowTypographyLayoutStylesheet', get_bloginfo('template_directory') . '/framework/admin/colorpicker/css/layout-flow.css' );
	wp_register_style( 'superslide-style', get_bloginfo('template_directory') . '/framework/admin/superslide/style.css' );
	wp_register_script('color_sampler', get_bloginfo('template_directory') . '/scripts/jquery.ImageColorPicker.js', array('jquery'), '1.0' );
	wp_register_script('jquery_colorpicker_script', get_bloginfo('template_directory') . '/framework/admin/colorpicker/js/colorpicker.js', array('jquery'), '1.0' );
	wp_register_script('jquery_colorpicker_script2', get_bloginfo('template_directory') . '/framework/admin/colorpicker/js/eye.js', array('jquery', 'jquery_colorpicker_script'), '1.0' );
	wp_register_script('jquery_colorpicker_script3', get_bloginfo('template_directory') . '/framework/admin/colorpicker/js/layout.js', array('jquery', 'jquery_colorpicker_script2'), '1.0' );
	wp_register_script('jquery_colorpicker_script4', get_bloginfo('template_directory') . '/framework/admin/colorpicker/js/utils.js', array('jquery', 'jquery_colorpicker_script3'), '1.0' );
	wp_register_script('jquery_colorpicker_script_main', get_bloginfo('template_directory') . '/framework/admin/colorpicker/colorpicker_uruchamiajacy_w_adminie.js', array('jquery', 'jquery_colorpicker_script'), '1.0' );
	wp_register_script('plupload_queue', get_bloginfo('template_directory') . '/scripts/jquery.plupload.queue.js', array('jquery'), '1.0' );
	wp_register_script('color_sampler_jquery_ui', get_bloginfo('template_directory') . '/scripts/jquery-ui-1.8.9.custom.min.js', array('jquery'), '1.0' );
	
	wp_enqueue_script('jquery');
	wp_enqueue_script('color_sampler_jquery_ui');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
	wp_enqueue_script('brisk-uploader');
	
	wp_enqueue_style( 'FlowTypographyLayoutStylesheet' );
	wp_enqueue_style( 'FlowTypographyStylesheet' );
	wp_enqueue_style( 'FlowTypographyMainStylesheet' );
	wp_enqueue_style( 'superslide-style' );
	wp_enqueue_script('color_sampler'); /* Image Sampler */
	wp_enqueue_script('jquery_colorpicker_script');
	wp_enqueue_script('jquery_colorpicker_script2');
	wp_enqueue_script('jquery_colorpicker_script3');
	wp_enqueue_script('jquery_colorpicker_script4');
	wp_enqueue_script('jquery_colorpicker_script_main');
	wp_enqueue_script('plupload-full');
	wp_enqueue_script('plupload-handlers');
	wp_enqueue_script('plupload_queue');
	wp_enqueue_script('swfobject');
}

function essenceactivate(){
	global $pagenow;
	if(is_admin() && $pagenow == 'themes.php' && isset($_GET['activated'])){
		if(!get_option("flowessencethemeactivated")){
			include_once (TEMPLATEPATH . '/install.php');
			update_option("flowessencethemeactivated", true);
		}
		wp_redirect(admin_url("admin.php?page=sub-page42"));
		exit();
	}
}
//add_action('admin_init', 'essenceactivate');
add_action('after_setup_theme', 'essenceactivate');
function addthemesupports(){
	add_theme_support('automatic-feed-links');
}
/* After setup theme runs each time you refresh page and not only on theme activation */
add_action('after_setup_theme', 'addthemesupports');

/* The purpose of $content_width: http://core.trac.wordpress.org/ticket/5777 */
if(!isset($content_width)){
	$content_width = 1120;
}

add_action('generate_rewrite_rules', 'ta_add_rewrite_rules');
function ta_add_rewrite_rules( $wp_rewrite ) {
 $new_rules = array('portfolio/([^/]+)/?$' => 'index.php?portfolio=$matches[1]');
 $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

function cp_admin_init(){
	if(!session_id()){
		session_start();
	}
}
//add_action('init', 'cp_admin_init');
?>