<?php 
if(is_admin()){
	$theme_settings = array(
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

	foreach($theme_settings as $k => $v){
		update_option($k, $v);
	}
}
?>