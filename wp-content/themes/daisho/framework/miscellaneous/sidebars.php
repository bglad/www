<?php
	$i = 0;
	$args = array(
	'name'          => sprintf(__('Sidebar %d', 'flowthemes'), $i ),
	'id'            => "sidebar-$i",
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>' );
	// Create sidebar areas
	if(function_exists('register_sidebar')){
		register_sidebars(4, array('before_title'=>'<h3>','after_title'=>'</h3>'));
	}
	
	
/* 	register_sidebar(array(
  'name' => __('Coming Soon Page', 'flowthemes'),
  'id' => 'sidebar-coming-soon-page-flow',
  'description' => __('This area accepts only Dribbble Widget. Dribbble Widget in this area will be shown on the Coming Soon Page Template only.', 'flowthemes'),
  'before_title' => '<h3 class="widgettitle">',
  'after_title' => '</h3>'
)); */
?>