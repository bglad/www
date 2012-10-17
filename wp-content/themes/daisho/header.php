<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
<head>
<if ( function_exists('get_countdown')) get_countdown();>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta charset="<?php bloginfo('charset'); ?>" />
	<?php if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod') || strstr($_SERVER['HTTP_USER_AGENT'],'Android') || strstr($_SERVER['HTTP_USER_AGENT'],'Windows Phone')){ ?>
		<meta name="viewport" content="user-scalable=yes, width=735" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<?php }else if(strstr($_SERVER['HTTP_USER_AGENT'],'iPad')){ ?>
		<meta name="viewport" content="user-scalable=yes, width=980" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<?php } ?>
	<title><?php
		if(is_home()){
			printf(_x('%s - Home', 'Homepage title', 'flowthemes'), get_bloginfo('name'));
		}else if(is_category()){
			printf(_x('Browsing the Category %s', 'Category page title', 'flowthemes'), wp_title(' ', false, ''));
		}else if(is_archive()){
			printf(_x('Browsing Archives of %s', 'Archives page title', 'flowthemes'), wp_title(' ', false, ''));
		}else if(is_search()){
			printf(_x('Search Results for %s', 'Search page title', 'flowthemes'), $s);
		}else if(is_404()){
			_e('404 - Page Not Found', 'flowthemes');
		}else{
			wp_title('-', true, 'right'); bloginfo('name'); 
		} ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php $custom_favicon=get_option("custom_favicon"); print((($custom_favicon)?$custom_favicon:bloginfo('template_directory')."/images/favicon.ico")); ?>" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_directory'); ?>/reset.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_directory'); ?>/fonts.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_directory'); ?>/grid.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_directory'); ?>/astyle.css" />
	<link href='http://fonts.googleapis.com/css?family=Dosis:400,800,700,600,500,300,200' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,800italic,700italic,700,600italic,600,400italic,300italic,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,900,300italic,300,100,700italic' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
		<style type="text/css">.sidebar-left-shadow { border-left:1px solid #dcdcdc; }</style>
		<style type="text/css">.sidebar-right-shadow { border-right:1px solid #dcdcdc; }</style>
	<![endif]-->
	
	<!--[if lt IE 9]>
	<script type="text/javascript">alert('<?php _e('Looks like your browser doesn\'t fully support HTML5 and CSS3. You need a recent version of Firefox, Chrome or Safari to display this website correctly.', 'flowthemes'); ?>');</script>
	<![endif]-->
	
	<?php include(dirname(__FILE__).'/styles.php'); ?>

	<?php
	/* This will return data of first found post on archives and search pages - to prevent that I use is_singular(). */
	if(is_singular()){
		$page_image = get_post_meta($post->ID, 'bg_image', true);
		$page_color = get_post_meta($post->ID, 'bg_color', true);
		$page_repeat = get_post_meta($post->ID, 'bg_repeat', true);
		$page_position = get_post_meta($post->ID, 'bg_position', true);
		$page_attachment = get_post_meta($post->ID, 'bg_attachment', true);
		$page_size = get_post_meta($post->ID, 'bg_size', true);
		$page_fullscreen = get_post_meta($post->ID, 'bg_fullscreen', true);
		$page_opacity = get_post_meta($post->ID, 'bg_opacity', true);
		if($page_image){ $style_output = 'background-image: url("'.$page_image.'"); '; }
		if($page_color){ $style_output .= 'background-color: '.$page_color.'; '; }
		if($page_repeat){ $style_output .= 'background-repeat: '.$page_repeat.'; '; }
		if($page_position){ $style_output .= 'background-position: '.$page_position.'; '; }
		if($page_attachment){ $style_output .= 'background-attachment: '.$page_attachment.'; '; }
		if($page_size){ $style_output .= 'background-size: '.$page_size.'; '; }
		if($style_output and !$page_fullscreen){ print("<style type=\"text/css\">body{ ".$style_output."}</style>"); }
	}
	?>

	<?php
	$custom_css_style = get_option("custom_css_style");
	if($custom_css_style){
		print("<style type=\"text/css\">".stripslashes($custom_css_style)."</style>");
	}
	?>
<script type="text/javascript">
$ = jQuery.noConflict();
	function info_box_resize(){
		var info_box_height = jQuery('.info-box').height();
		jQuery('.info-box').css({ 'margin-top' : ~info_box_height+5 });
		jQuery(".info-box").hover(
		  function () {
			jQuery(this).stop().animate({ 'margin-top' : 0 }, 300);
		  },
		  function () {
			jQuery(this).stop().animate({ 'margin-top' : ~info_box_height+5 }, 300);
		  }
		);
	}
	function videojsvolumemuteclick(){
		jQuery(".vjs-volume-control").click(function() {
			if(jQuery(".video-js").prop('muted')){
				jQuery(".video-js").prop('muted', false).prop('volume', 1);
			}else{
				jQuery(".video-js").prop('muted', true).prop('volume', 0);
			}
		});
	}
	
jQuery(window).load(function(){
	try{
		videojsvolumemuteclick();
	}catch(e){}
});
jQuery(document).ready(function(){
	jQuery('body').animate({ 'opacity' : 1 }, 700);
	info_box_resize();
	jQuery(window).resize(function(){
		info_box_resize();
	});
});
jQuery(document).ready(function(){
	jQuery('#mobile_menu').change(function(e){
		window.location = jQuery(this).val();
	})
	jQuery('#mobile_menu .mob-sub').hide();
	
	var max_width = 0;
	var current_compact_display = 0;
	jQuery('#menu .sub-menu, #menu-compact .sub-menu').each(function(){
		jQuery(this).css({ 'display' : 'block' });
		current_compact_display = jQuery('#main-nav-compact').css('display');
		jQuery('#main-nav-compact').css({ 'display' : 'block' });
		max_width = 0;
		jQuery(this).find('li').each(function(){
			if(max_width >= jQuery(this).innerWidth()){
			
			}else{
				max_width = jQuery(this).innerWidth();
			}
		});
		jQuery(this).find('li').width(max_width+10);
		jQuery(this).css({ 'display' : 'none' });
		jQuery('#main-nav-compact').css({ 'display' : current_compact_display });
	});
});
</script>
</head>
<body <?php if(!isset($class)){ $class = ''; } body_class($class); ?>>

<div class="header-search-form" style="display:none;"><div class="header-search-label"><?php _e('Search', 'flowthemes'); ?></div><?php get_search_form(); ?></div>

<?php if($page_fullscreen && $page_image){ ?>
<script type="text/javascript">
function resizeimageslide(ielement,isvideo,chkpushwidthtoarr){
	var iel = jQuery(ielement);
	
	/* Create slideshow container, var winheight is height() fix for iPhone */
	var winheight = window.innerHeight ? window.innerHeight:jQuery(window).height();
	//var fg_imgareaw = jQuery(window).width(), fg_imgareah = jQuery(window).height();
	var fg_imgareaw = jQuery(window).width(), fg_imgareah = winheight;
	var fg_imgsize = [iel.width(), iel.height()];
	var fg_fitscreen = false;
	if(iel.hasClass("slide_horizontal")){
		fg_fitscreen = true;
	}
	if(isvideo){
		fg_imgsize = [16,9];
	}
	if(iel.is("div")){
		fg_imgsize = [fg_imgareaw, fg_imgareah];
		resizeimageslide(jQuery("img:not(.myimage)", iel),false,false);
	}
	if(fg_imgsize[0] && fg_imgsize[1] && fg_imgareaw && fg_imgareah){
		//if(fg_imgsize[0] < fg_imgareaw || fg_imgsize[1] < fg_imgareah){
		var fg_imgnewsizew=0, fg_imgnewsizeh=0;
		var fg_imgscalerx = fg_imgsize[0]/fg_imgareaw, fg_imgscalery = fg_imgsize[1]/fg_imgareah;
		if(fg_fitscreen){
			if(fg_imgscalerx <= fg_imgscalery){
				fg_imgnewsizew = fg_imgsize[0]/fg_imgscalery;
				fg_imgnewsizeh = fg_imgsize[1]/fg_imgscalery;
			}else{
				fg_imgnewsizew = fg_imgsize[0]/fg_imgscalerx;
				fg_imgnewsizeh = fg_imgsize[1]/fg_imgscalerx;
			}
		}else{
			if(fg_imgscalerx <= fg_imgscalery){
				fg_imgnewsizew = fg_imgsize[0]/fg_imgscalerx;
				fg_imgnewsizeh = fg_imgsize[1]/fg_imgscalerx;
			}else{
				fg_imgnewsizew = fg_imgsize[0]/fg_imgscalery;
				fg_imgnewsizeh = fg_imgsize[1]/fg_imgscalery;
			}
		}
		if(fg_imgnewsizew && fg_imgnewsizeh){
			fg_imgnewsizew = Math.round(fg_imgnewsizew);
			fg_imgnewsizeh = Math.round(fg_imgnewsizeh);
			if(!isvideo){
				if(fg_fitscreen){
					if(fg_imgscalerx <= fg_imgscalery){
						iel.css({'top':'0px', 'left':'0px', 'width':fg_imgnewsizew+'px', 'height':fg_imgnewsizeh+'px'});
						iel.parent().css({'width':fg_imgnewsizew+'px', 'height':fg_imgnewsizeh+'px'});
					}else{
						iel.css({'top':Math.floor((fg_imgareah-fg_imgnewsizeh)/2)+'px', 'left':(Math.floor((fg_imgareaw-fg_imgnewsizew)/2))+'px', 'width':fg_imgnewsizew+'px', 'height':fg_imgnewsizeh+'px'});
					}
					if(chkpushwidthtoarr){
						if(fg_imgscalerx <= fg_imgscalery){
							portfolioslideswidths[portfolioslideswidths.length] = fg_imgnewsizew;
						}else{
							portfolioslideswidths[portfolioslideswidths.length] = fg_imgareaw;
						}
					}
				}else{
					iel.css({'top':Math.floor((fg_imgareah-fg_imgnewsizeh)/2)+'px', 'left':(Math.floor((fg_imgareaw-fg_imgnewsizew)/2))+'px', 'width':fg_imgnewsizew+'px', 'height':fg_imgnewsizeh+'px'});
					if(chkpushwidthtoarr){
						portfolioslideswidths[portfolioslideswidths.length] = fg_imgareaw;
					}
				}
			}else{
				jQuery(".video-js", iel).css({'top':Math.floor((fg_imgareah-fg_imgnewsizeh)/2)+'px', 'left':(Math.floor((fg_imgareaw-fg_imgnewsizew)/2))+'px', 'width':fg_imgnewsizew+'px', 'height':fg_imgnewsizeh+'px'});
				if(chkpushwidthtoarr){
					portfolioslideswidths[portfolioslideswidths.length] = fg_imgareaw;
				}
			}
		}
	}else{
		return false;
	}
	return true;
}
jQuery(document).ready(function(){
	resizeimageslide(jQuery("#myimage_original"),false,false);
	jQuery(window).resize(function(){
		resizeimageslide(jQuery("#myimage_original"),false,false);
	});
});
</script>
<img src="<?php echo $page_image; ?>" alt="" id="myimage_original" style="<?php if($page_opacity or $page_opacity == 0){ echo'opacity:'.$page_opacity.';'; } ?>">
<?php } ?>

<header id="header">
	<div class="inner clearfix">
		<?php $logo_type = get_option('logo_type');
		if(preg_match('/^.*\.(jpg|jpeg|png|gif|ico)$/i', $logo_type)){
			$blog_url = get_home_url();
			$blog_desc = get_bloginfo('description');
			$lng_switcher = language_selector_flags();
			echo "<div id=\"logo-image\"><a title=\"". $blog_desc ."\" href=\"". $blog_url ."\"><img src=\"".$logo_type."\" alt=\"" . $blog_desc . "\" /></a>".$lng_switcher."<div class=\"clear\"></div></div>";
		}else{ ?>
		<div id="logo-text">
			<div class="logo-text-inner">
				<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
				<?php if(get_option('tagline_disable') == 0){ ?>
				<div id="tagline">
					<a rel="home" title="<?php bloginfo('description'); ?>" href="<?php bloginfo('url'); ?>"><?php bloginfo('description'); ?></a>
				</div>
				<?php } ?>
				<div class="clear"></div>
			</div>
		</div>
		<?php } ?>
		<nav id="main-nav">
			<div class="clearfix">
				<?php wp_nav_menu(array('sort_column' => 'menu_order', 'theme_location'=>'main_menu', 'menu_class'=>'', 'menu_id'=>'menu', 'walker' => new description_walker())); ?>
				<?php wp_nav_menu(array('sort_column' => 'menu_order', 'theme_location'=>'mobile_menu', 'menu_id'=>'mobile_menu', 'items_wrap' => '<select name="-Menu-" id="%1$s" class="%2$s">%3$s</select>', 'walker' => new select_menu_walker())); ?>
			</div>
			<div class="clear"></div>
		</nav>
	</div> <!-- /.inner -->
</header>
<?php 
$info_box_page = get_option('info_box');
	if($page_id = $info_box_page){
		$page_data = get_page( $page_id );
?>
<div class="info-box">
	<div class="info-box-inner clearfix container_12">
		<?php echo do_shortcode($page_data->post_content); ?>
		<img src="<?php bloginfo('template_directory'); ?>/images/header-arrow.png" class="header-arrow">
	</div>
</div>
<?php } ?>

<?php if(is_page_template('template-blog.php') or is_archive() or is_singular('post') or is_search()){
	$blog_page = get_option('flow_blog_page');
	$blog_page_link = get_permalink($blog_page);
	if(is_page_template('template-blog.php')){ $blog_page_link = get_bloginfo('url'); }
?>
<nav id="main-nav-compact">
	<div class="clearfix" style="max-width:1120px; margin:0 auto; width: 92%;position: relative;">
		<a class="header-back-to-blog-link" href="<?php echo $blog_page_link; ?>"><div class="header-back-to-blog clearfix"><div class="header-back-to-blog-icon"></div><div class="header-back-to-blog-message"><?php _e('Back', 'flowthemes'); ?></div></div></a>
		<div class="header-search">L<div class="header-search-text"><?php _e('Search', 'flowthemes'); ?></div></div>
		<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location'=>'main_menu', 'menu_class'=>'menu-compact', 'menu_id'=>'menu', 'walker' => new compact_menu_walker() ) ); ?>
	</div>
</nav>
<?php } ?>