<?php
	if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod') || strstr($_SERVER['HTTP_USER_AGENT'],'Android')){ $mobile = true; }else{ $mobile = false; }
	if(strstr($_SERVER['HTTP_USER_AGENT'],'iPad')){ $ipad = true; }else{ $ipad = false; }
	if($_GET['featured'] == 'true') { $_SESSION['featured']=0; }
	if($_GET['featured'] == 'false') { $_SESSION['featured']=1; }
	$cur_slideshow = get_option("flow_featured_slideshow");
	if(isset($_SESSION['featured']) && ($_SESSION['featured'] == 0)){ $cur_slideshow = 0; }
	if(isset($_SESSION['featured']) && ($_SESSION['featured'] == 1)){ $cur_slideshow = 1; }
	// if ($cur_slideshow == 0 AND !$mobile) { ?>
<?php  if(get_option("flow_featured_slideshow") == 0 AND !$mobile){ ?>
<script type="text/javascript">
//Setup iScroll4 plugin
var myScroll;

function loaded() {
	myScroll = new iScroll('wrapper', {
		snap: 'li',
		momentum: false,
		hScrollbar: false,
		vScrollbar: false,
		hScroll: true,
		vScroll: false,
		wheelAction: 'none',
		onScrollMove: function() { },
		onRefresh: function() { },
	 });
}

//This function check if image has already loaded and resizes it to fit screen if so (used in iScroll refresh).
function resizeimagesflow(rrr){
	if(jQuery(rrr).height() == 0 || jQuery(rrr).width() == 0){
		setTimeout(function(){
			resizeimagesflow(rrr);
		}, 500);
	}else{
		//resizeimageslide($(rrr),false,false); //Call to function located in header.php
	}
}

//This function resizes all newly added video slides (posters + video tags) and is triggered on window resize event.
function resizevideosflow(){
	jQuery(".video-slidex").each(function(){
		var current_video_height = jQuery(this).find(".videoBG video").height();
		var current_video_width = jQuery(this).find(".videoBG video").width();
		//var current_window_height = jQuery(window).innerHeight(); //Doesn't work on iPhone due to top address bar
		var current_window_height = window.innerHeight ? window.innerHeight:$(window).height();
		var current_window_width = jQuery(window).innerWidth();
		if((current_video_width/current_video_height) >= (current_window_width/current_window_height)){
			jQuery(this).css({ 'height' : current_window_height, 'width' : current_window_width });
			jQuery(this).find(".videoBG_wrapper").css({ 'height' : current_window_height, 'width' : current_window_width });
			jQuery(this).find(".videoBG").css({ 'height' : current_window_height, 'width' : current_window_width });
			jQuery(this).find(".videoBG video").css({ 'height' : current_window_height, 'width' : 'auto', "left" : 0, "top" : 0 });
		}else{
			jQuery(this).css({ 'height' : current_window_height, 'width' : current_window_width });
			jQuery(this).find(".videoBG_wrapper").css({ 'height' : current_window_height, 'width' : current_window_width });
			jQuery(this).find(".videoBG").css({ 'height' : current_window_height, 'width' : current_window_width });
			jQuery(this).find(".videoBG video").css({ 'height' : 'auto', 'width' : current_window_width, "left" : 0, "top" : 0 });
		}
	});
}

	var current_slide = 0; //Initial slide is always 0
	
	function slideshow_next_slide(){
		var number_of_slides = jQuery("#thelist li").length; //Number of slides (each slide has id="slide_0", id="slide_1" etc.)
		if(jQuery("#slide_"+current_slide).hasClass("video-slidex")){
			$("#slide_"+current_slide+" video").get(0).pause();
		}
		current_slide++; if(current_slide == number_of_slides){ current_slide = 0; }
		if(jQuery("#slide_"+current_slide).hasClass("video-slidex")){
			$("#slide_"+current_slide+" video").get(0).play();
		}
		<?php if($ipad || $mobile){ ?>
		myScroll.scrollToPage(current_slide, 0, 300);
		<?php }else{ ?>
		if($(window).width() <= 1024){
			myScroll.scrollToPage(current_slide, 0, 300);
		}else{
			myScroll.scrollToPage(current_slide, 0, 0);
			sliderAnimationsFlow();
		}
		<?php } ?>
	}
	function slideshow_prev_slide(){
		var number_of_slides = jQuery("#thelist li").length; //Number of slides (each slide has id="slide_0", id="slide_1" etc.)
		if(jQuery("#slide_"+current_slide).hasClass("video-slidex")){
			$("#slide_"+current_slide+" video").get(0).pause();
		}
		current_slide--; if(current_slide == -1){ current_slide = number_of_slides-1; }
		if(jQuery("#slide_"+current_slide).hasClass("video-slidex")){
			$("#slide_"+current_slide+" video").get(0).play();
		}
		<?php if($ipad || $mobile){ ?>
		myScroll.scrollToPage(current_slide, 0, 300);
		<?php }else{ ?>
		if($(window).width() <= 1024){
			myScroll.scrollToPage(current_slide, 0, 300);
		}else{
			myScroll.scrollToPage(current_slide, 0, 0);
			sliderAnimationsFlow();
		}
		<?php } ?>
	}
	function sliderAnimationsFlow(){
		/* Animation - Flow */
		var button_margin = '0.4em';
		var rand_no = (Math.floor(Math.random()*10000000))%3+1;
		var padding_type = 'padding-left';
		if(rand_no == 1){ padding_type = 'padding-left'; }else if(rand_no == 2){ padding_type = 'padding-right'; }else if(rand_no == 3){ padding_type = 'padding-top'; }
		var img_margin = 0;
		jQuery("#slide_"+current_slide).find('.slideshow-project-title').css({ 'opacity': 0, 'margin-top' : 40+'px' });
		jQuery("#slide_"+current_slide).find('.project-description-home').css({ 'opacity': 0, 'margin-top' : 40+'px' });
		jQuery("#slide_"+current_slide).find('.button').css({ 'opacity': 0, 'margin-top' : -40+'px' });
		jQuery("#slide_"+current_slide).find('.slide-img').css({ 'opacity': 0}).css(padding_type,240+'px');
		
		jQuery("#slide_"+current_slide).find('.slideshow-project-title').animate({ 'opacity': 1, 'margin-top' : 0+'px' }, 600);
		jQuery("#slide_"+current_slide).find('.project-description-home').animate({ 'opacity': 1, 'margin-top' : 0+'px' }, 600);
		jQuery("#slide_"+current_slide).find('.button').animate({ 'opacity': 1, 'margin-top' : button_margin }, 700, 'easeOutBounce');
		var amap = {'opacity': 1};
		amap[padding_type] = img_margin;
		jQuery("#slide_"+current_slide).find('.slide-img').animate(amap, 300, 'easeInOutCirc');
	}
	$.fn.imageLoad = function(fn){
		this.load(fn);
		this.each( function() {
			if ( this.complete && this.naturalWidth !== 0 ) {
				$(this).trigger('load');
			}
		});
	}


document.addEventListener('DOMContentLoaded', loaded, false);

jQuery(document).ready(function(){

	/* Define correct height() for iPhone (jQuery 1.7.2 FIX). Announced to be repaired in jQuery 1.8 */
	var winheight = window.innerHeight ? window.innerHeight:$(window).height();
	
	/* Initial visual fixes */
	jQuery(".video-slidex").css({ 'height' : winheight, 'width' : $(window).width() });
	//jQuery("body").css({ 'overflow' : "hidden" });
	jQuery(".imgscontainer").css({ 'opacity' : 0 });
	setTimeout(function(){
		jQuery('body').stop().animate({"opacity":1}, 400);
	}, 500);
	
	//Eliminate window resizing problems
	$(window).bind("resize.featuredhandler", function(){
		winheight = window.innerHeight ? window.innerHeight:$(window).height();
		jQuery(".image-slide").css({ 'height' : winheight, 'width' : $(window).width() });
		resizevideosflow();
		jQuery(".slideshow-project-excerpt").each(function(){
			var outer_a_height = jQuery(this).children(".project-more").css({"display":"block"}).outerHeight(true);
			jQuery(this).parent().parent().parent().parent().find(".excerpt-clone").css({ "height" : jQuery(this).height()+outer_a_height });
			jQuery(this).css({ "bottom" : "auto" }).css({ "height" : jQuery(this).height() }).css({ "bottom" : "0" });
			jQuery(this).css({ "height" : "auto" }).css({ "bottom" : "auto" });
			var project_excerpt_height = jQuery(this).height();
			jQuery(this).css({ "height" : project_excerpt_height }).css({ "bottom" : "0" });
		});
		setTimeout(function(){
			jQuery(".konzept_arrow_left").trigger("click");
			jQuery(".konzept_arrow_right").trigger("click");
		}, 0);
	});
	jQuery(".image-slide").css({ 'height' : winheight, 'width' : $(window).width() });
	jQuery(".video-slidex").css({ 'height' : winheight, 'width' : $(window).width() });
	jQuery(".slideshow-project-excerpt").each(function(){
		var project_excerpt_height = parseInt(jQuery(this).height());
		jQuery(this).css({ "height" : project_excerpt_height }).css({ "bottom" : "0" });
	});
	//jQuery(".slide-img").each(function(i,e){ resizeimagesflow(this); });
	$(".slide-img").each(function(i,e){
		jQuery(this).imageLoad(function(){
			//resizeimagesflow(this);
			//resizeimageslide($(this),false,false);
		});
	});
	
	//Kill all events, restore normal state
	var header_color = jQuery("#header").css("background-color");
	jQuery("#header").css({"background-color" : "transparent"});
	jQuery(".pf_nav a").bind("click.featuredhandler", function(){
		jQuery(".pf_nav a").unbind("click.featuredhandler");
		jQuery(window).unbind("resize.featuredhandler");
		jQuery(".konzept_arrow_left").unbind("click");
		jQuery(".konzept_arrow_right").unbind("click");
		jQuery(".imgscontainer").css({ 'opacity' : 0 });
		jQuery("#konzept_slideshow").animate({ 'opacity' : 0 }, 1000, function(){
			jQuery("#konzept_slideshow").css({ 'display' : "none" });
			jQuery("#header").css({ 'background-color' : header_color });
			jQuery("#konzept_slideshow").remove();
			jQuery(".imgscontainer").animate({ 'opacity' : 1 }, 1000 );
		});
		
		// Necessary to resize thumbnails after browser's scrollbar is added
		jQuery(window).trigger("resize");
	});
	
	/* Create controls (keyboard, mousewheel, mouse click) */	
	$("#konzept_slideshow").mousewheel(function(event, delta) {
	var dir = delta > 0 ? slideshow_prev_slide() : slideshow_next_slide();
		event.preventDefault();
	});
   	jQuery(window).keydown(function(e){
		if(e.keyCode == 37 || e.keyCode == 38){
			slideshow_prev_slide();
		}else if(e.keyCode == 39 || e.keyCode == 40){
			slideshow_next_slide();
		}
	});
	if(navigator.userAgent.toLowerCase().match(/(iphone|ipod|ipad|android)/)){
		jQuery(".konzept_arrow_left").remove();
		jQuery(".konzept_arrow_right").remove();
	}
	jQuery(".konzept_arrow_left").click(function(){
		slideshow_prev_slide();
	});	
	jQuery(".konzept_arrow_right").click(function(){
		slideshow_next_slide();
	});
	//autoplay_flow();
});
function autoplay_flow(){
	setTimeout(function(){
		slideshow_next_slide();
		autoplay_flow();
	}, 12000);
}
</script>
<div id="konzept_slideshow">
	<!--<div class="konzept_arrow_left"></div>
	<div class="konzept_arrow_right"></div>-->
	<div id="wrapper">
		<div id="scroller">
			<ul id="thelist">
<?php 
	$args = array( 'post_type' => 'slideshow' );
	$recent = new WP_Query( $args );
	while($recent->have_posts()) : $recent->the_post();
	
	// Set variables
	if(get_post_meta($post->ID, 'slide-link', true)){ $slide_link = get_post_meta($post->ID, 'slide-link', true); }else{ $slide_link = get_permalink(); }
	if(get_post_meta($post->ID, 'slide-link-name', true)){ $slide_link_name = get_post_meta($post->ID, 'slide-link-name', true); }else{ $slide_link_name = __('View Item', 'flowthemes'); }
	if(get_post_meta($post->ID, 'Title', true)){ $page_title = get_post_meta($post->ID, 'Title', true); }else{ $page_title = get_the_title(); }
	if(get_post_meta($post->ID, 'Description', true)){ $page_description = get_post_meta($post->ID, 'Description', true); }else{ unset($page_description); }
	if(get_post_meta($post->ID, 'slide-image', true)){ $slide_image = get_post_meta($post->ID, 'slide-image', true); }else{ unset($slide_image); }
	if(get_post_meta($post->ID, 'slide-video', true)){ $slide_video = get_post_meta($post->ID, 'slide-video', true); }else{ unset($slide_video); }
	//if(get_post_meta($post->ID, 'slide-video-mp4', true)){ $slide_video_mp4 = get_post_meta($post->ID, 'slide-video-mp4', true); }else{ unset($slide_video_mp4); }
	$slide_video_mp4 = false;
	if(get_post_meta($post->ID, 'slide-video-ogg', true)){ $slide_video_ogg = get_post_meta($post->ID, 'slide-video-ogg', true); }
	if(get_post_meta($post->ID, 'slide-video-webm', true)){ $slide_video_webm = get_post_meta($post->ID, 'slide-video-webm', true); }
	if(get_post_meta($post->ID, 'slide-video-poster', true)){ $slide_video_poster = get_post_meta($post->ID, 'slide-video-poster', true); }
	if(get_post_meta($post->ID, 'slide-image-x-offset', true)){ $slide_image_x_offset = 'left:'.get_post_meta($post->ID, 'slide-image-x-offset', true).';'; }else{ unset($slide_image_x_offset); }
	if(get_post_meta($post->ID, 'slide-image-y-offset', true)){ $slide_image_y_offset = 'top:'.get_post_meta($post->ID, 'slide-image-y-offset', true).';'; }else{ unset($slide_image_y_offset); }
	if(get_post_meta($post->ID, 'slide-button-x-offset', true)){ $slide_button_x_offset = get_post_meta($post->ID, 'slide-button-x-offset', true); }else{ $slide_button_x_offset = '0px'; }
	if(get_post_meta($post->ID, 'slide-button-y-offset', true)){ $slide_button_y_offset = get_post_meta($post->ID, 'slide-button-y-offset', true); }else{ $slide_button_y_offset = '0px'; }
	if(get_post_meta($post->ID, 'slide-button-icon', true)){ $slide_button_icon = get_post_meta($post->ID, 'slide-button-icon', true); }else{ unset($slide_button_icon); }
	if(get_post_meta($post->ID, 'slide-color', true)){ $slide_color = get_post_meta($post->ID, 'slide-color', true); }else{ $slide_color = '#00a4a7'; }
	if(get_post_meta($post->ID, 'slide-text-color', true) == '#464646'){ $slide_text_color_title = 'slideshow-project-title-dark'; $slide_text_color_desc = 'slideshow-project-desc-dark'; $slide_button_dark = '#464646'; }else{ unset($slide_text_color_title); unset($slide_text_color_desc); $slide_button_dark = '#f1f1f1'; }
	if(isset($slide_id)){ $slide_id++; }else{ $slide_id = 0; }
	
	//Display slides
	if($slide_image){ $button_styles .='
	<style type="text/css">
#slide_'.$slide_id.' .button {
	position:			absolute;
	right:				'.$slide_button_x_offset.';
	top:				'.$slide_button_y_offset.';
	color: 				'.$slide_button_dark.'!important;
	font-family:		\'Open Sans\', Arial, sans-serif;
	font-weight: 		900;
	text-shadow:		0px 2px 2px #fff inset;
	text-shadow:		0px -1px 0px '.hexDarker($slide_color, 8).';
	text-transform:		uppercase;
	padding: 			0.7em 1em 0.7em;
	-webkit-border-radius: 	2em 2em 2em 2em;
	-moz-border-radius: 	2em 2em 2em 2em;
	border-radius: 			2em 2em 2em 2em;
	background-color: 	'.$slide_color.';
	background-image: 	-moz-linear-gradient(center top , rgba(255, 255, 255, 0.75) 0%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0.25) 100%);
	background-image: 	-webkit-linear-gradient(top, rgba(255, 255, 255, 0.75) 0%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0.25) 100%);
	background-image: 	linear-gradient(top, rgba(255, 255, 255, 0.75) 0%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0.25) 100%);
}
#slide_'.$slide_id.' .button:hover { background-color: '.hexDarker($slide_color, 10).'; text-decoration: none; }
	</style>'; ?>
	<li id="slide_<?php echo $slide_id; ?>" class="image-slide">
		<div class="konzept_arrow_left"></div>
		<div class="konzept_arrow_right"></div>
		<div class="slideshow-project-excerpt">
			<div class="konzept_arrow_left"></div>
			<div class="konzept_arrow_right"></div>
			<h1 class="slideshow-project-title <?php echo $slide_text_color_title; ?>"><?php echo $page_title; ?></h1>
			<h4 class="project-description-home <?php echo $slide_text_color_desc; ?>"><?php echo summarise_excerpt($page_description,70); ?></h4>
		<!--	<a class="project-more" href="<?php //echo $slide_link; ?>" title="<?php //echo $page_title; ?>"><?php //echo $slide_link_name; ?></a> -->
		</div>
		<div style="max-width:1120px;width:92%;margin:0 auto;position: relative;z-index: 9999999;"><a href="<?php echo $slide_link; ?>" data-icon="<?php echo $slide_button_icon; ?>" class="button"><?php echo $slide_link_name; ?></a></div>
		<img class="slide-img" style="position: absolute; clear: both;" style="<?php echo $slide_image_x_offset.$slide_image_y_offset; ?>" src="<?php echo $slide_image; ?>" alt="<?php echo $page_title; ?>" />
		<div style="width:100%;height:100%;background-color: <?php echo $slide_color; ?>;"></div>
	</li>
	<?php }else if($slide_video_mp4){ ?>
	<!--<script type="text/javascript">
		jQuery(document).ready(function(){
			$('#slide_<?php //echo $slide_id; ?>').videoBG({
				mp4:'<?php //echo $slide_video_mp4; ?>',
				ogv:'<?php //echo $slide_video_ogg; ?>',
				webm:'<?php //echo $slide_video_webm; ?>',
				poster:'<?php //echo $slide_video_poster; ?>',
				scale:true,
				//fullscreen: true,
				//autoplay:false, //Doesn't work! Workaround below.
				zIndex:0,
				loop: true,
			});
			setTimeout(function(){ //Bad luck, this is some crappy plugin and settimeout seems to be the only way out. No callback supported!
			<?php //if($slide_id == 0){ }else{ echo '$("#slide_'.$slide_id.' video").get(0).pause();'; } ?>
			<?php //if($ipad){ echo '$("#slide_'.$slide_id.' video").get(0).play();'; } ?>
			}, 1500);
			jQuery(".konzept_arrow_left").unbind("click");
			jQuery(".konzept_arrow_right").unbind("click");
			jQuery(".konzept_arrow_left").click(function(){
				slideshow_prev_slide();
			});	
			jQuery(".konzept_arrow_right").click(function(){
				slideshow_next_slide();
			});
		});
	</script>
	<li id="slide_<?php //echo $slide_id; ?>" class="video-slidex">
		<div class="konzept_arrow_left"></div>
		<div class="konzept_arrow_right"></div>
		<div class="slideshow-project-excerpt">
			<div class="konzept_arrow_left"></div>
			<div class="konzept_arrow_right"></div>
			<h1 class="slideshow-project-title"><?php //echo $page_title; ?></h1>
			<h4 class="project-description"><?php //echo summarise_excerpt($page_description,70); ?></h4>
			<a class="project-more" href="<?php //echo $slide_link; ?>" title="<?php //echo $page_title; ?>"><?php //echo $slide_link_name; ?></a>
		</div>
	</li>-->
	<?php } ?>
	<?php endwhile; ?>
			</ul>
			<?php //echo $button_styles; ?>
		</div> <!-- /#scroller -->
	</div> <!-- /#wrapper -->
</div> <!-- /#konzept_slideshow -->
<?php } ?>