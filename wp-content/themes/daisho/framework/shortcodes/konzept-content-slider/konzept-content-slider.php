<?php 
	function konzept_content_slider($atts, $content = null) {
		$class = shortcode_atts( array('title' => 'No Title Specified', 'icon' => '', 'image' => '', 'description' => '', 'title_link' => ''), $atts );
		if($class['icon'] != ''){ $icon = '<span class="news-icon">'.$class['icon'].'</span>'; }
		if($class['image'] != ''){ $image = '<img class="news-image" src="'.$class['image'].'" alt="" />'; }
		if($class['description'] != ''){ $description = '<span class="news-description">'.$class['description'].'</span>'; }
		if($class['title_link'] != ''){ $class['title'] = '<a href="'.$class['title_link'].'">'.$class['title'].'</a>'; }

		return '<div class="excerpt excerpt-blog" style="width: 350px; float:left; margin-right: 80px; display: inline-block;"><div class="news-date" style="height:10px;"></div>'.$image.$icon.'<h1 class="news-title" style="margin-bottom:20px;">'.$class['title'].''.$description.'</h1><div class="news-content">'.do_shortcode($content).'</div></div>';
	}
	add_shortcode("content_block", "konzept_content_slider");
?>