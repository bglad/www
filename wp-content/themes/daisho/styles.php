<?php
	if($_GET['prj'] == 'classic') { $_SESSION['prj'] = 0; }
	if($_GET['prj'] == 'thumb') { $_SESSION['prj'] = 1; }
	$portfolio_mode 	= 	get_option('portfolio_mode'); // 1 = thumbnail grid, 0 = classic
	if(isset($_SESSION['prj']) && ($_SESSION['prj'] == 0)){ $portfolio_mode = 0; }
	if(isset($_SESSION['prj']) && ($_SESSION['prj'] == 1)){ $portfolio_mode = 1; }
	if((($portfolio_mode == '1' and is_home()) or is_page_template('template-portoflio.php')) or ($portfolio_mode == '1' and is_singular('portfolio'))){ /* THUMBNAIL VIEW */ ?>
	<style type="text/css">
	@media (min-width: 950px) and (max-width: 1240px) {
		#header .inner, .welcome-text, #footer .inner, .footer-bottom, .tn-grid-container, .info-box .info-box-inner { width: 900px; }
	}
	@media (min-width: 750px) and (max-width: 950px) {
		#header .inner, .welcome-text, #footer .inner, .footer-bottom, .tn-grid-container, .info-box .info-box-inner { width: 675px; }
	}
	@media (max-width: 950px) {
		#mobile_menu { display: block; }
		#menu{ display: none; }
		#main-nav { margin-top: 25px; position: absolute; top: 0; width: 75%; }
		#header { min-height: 100px; position: fixed; border-bottom: 1px solid #AAAAAA; box-shadow: 0 0 8px #888888; }
		#header .inner { border-bottom: 0 none; min-height: 100px; }
		body { padding-top: 120px!important; }
		#footer .inner { display: none; }
		.homepage-project-list { position: static!important; border-bottom: 0 none; padding-top: 20px; margin-bottom: 20px !important; }
		#footer { position: relative; width: 100%;
		background-image: linear-gradient(bottom, rgb(25,23,24) 0%, rgb(49,47,48) 100%);
		background-image: -o-linear-gradient(bottom, rgb(25,23,24) 0%, rgb(49,47,48) 100%);
		background-image: -moz-linear-gradient(bottom, rgb(25,23,24) 0%, rgb(49,47,48) 100%);
		background-image: -webkit-linear-gradient(bottom, rgb(25,23,24) 0%, rgb(49,47,48) 100%);
		background-image: -ms-linear-gradient(bottom, rgb(25,23,24) 0%, rgb(49,47,48) 100%);
		background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0, rgb(25,23,24)), color-stop(1, rgb(49,47,48)));
		border-top: 1px solid #131313; box-shadow: 0px 5px 30px rgba(0,0,0,0.8); -webkit-box-shadow: -5px -5px 5px rgba(0,0,0,0.8); opacity:1; }
		#footer_copyright { float: left; width: 100%; text-align: center; padding-bottom: 0; font-size: 16px; }
		.footer_widgets { float: left; width: 100%; text-align: center; }
		.footer-bottom { margin: 8px auto 40px; }
		.footer-bottom-widgets { display: inline-block; float: none; margin-top: 15px; }
		#social { padding-bottom: 10px; padding-top: 12px; float: left; }
		#social a { float:left; position:relative; text-decoration:none; width:37px; height: 37px; clear:both; }
		#social li { float:left; width: 37px; margin-left: 22px; margin-right: 22px; }
		#social a span { cursor:pointer; display:block; left:0; position:absolute; top:0; font-size: 37px; color: #a6aAaB; }
		#footer {
			border-top: 1px solid #BBBBBB;
			background-image: linear-gradient(bottom, #DADADA 0%, #F4F4F4 100%);
			background-image: -o-linear-gradient(bottom, #DADADA 0%, #F4F4F4 100%);
			background-image: -moz-linear-gradient(bottom, #DADADA 0%, #F4F4F4 100%);
			background-image: -webkit-linear-gradient(bottom, #DADADA 0%, #F4F4F4 100%);
			background-image: -ms-linear-gradient(bottom, #DADADA 0%, #F4F4F4 100%);
			background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0, #DADADA), color-stop(1, #F4F4F4));
			 box-shadow: 0 5px 30px rgba(0, 0, 0, 0.4);
			-webkit-box-shadow: -5px -5px 5px rgba(0, 0, 0, 0.15);
		}
		#header {
			background-color: #ffffff;
			background-image: linear-gradient(bottom, #DADADA 0%, #F4F4F4 100%);
			background-image: -o-linear-gradient(bottom, #DADADA 0%, #F4F4F4 100%);
			background-image: -moz-linear-gradient(bottom, #DADADA 0%, #F4F4F4 100%);
			background-image: -webkit-linear-gradient(bottom, #DADADA 0%, #F4F4F4 100%);
			background-image: -ms-linear-gradient(bottom, #DADADA 0%, #F4F4F4 100%);
			background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0, #DADADA), color-stop(1, #F4F4F4));
		}
	}
	</style>
	<?php }else if(($portfolio_mode == '0' and is_home()) || ($portfolio_mode == '0' && is_singular('portfolio'))){ /* CLASSIC VIEW */ ?>
	<style type="text/css">
	@media (max-width: 1260px) {
		#header .inner, .welcome-text, #footer .inner, .footer-bottom, .page-content, .recent-blog-container, .slideshow-project-excerpt, .info-box .info-box-inner { max-width: 1000px!important; }
		.recent-heading-container { max-width: 1005px; }
		.element { height: 133px; width: 196px; }
		#footer .inner .grid_12 img { float: left; margin: 0 1%; max-width: 220px; width: 18%; }
	}
	@media (max-width: 1150px) {
		#header .inner, .welcome-text, #footer .inner, .footer-bottom, .page-content, .recent-blog-container, .slideshow-project-excerpt, .info-box .info-box-inner { max-width: 900px!important; }
		.recent-heading-container { max-width: 905px; }
		.element { height: 120px; width: 176px; }
	}
	@media (max-width: 1050px) {
		#header .inner, .welcome-text, #footer .inner, .footer-bottom, .page-content, .recent-blog-container, .slideshow-project-excerpt, .info-box .info-box-inner { max-width: 800px!important; }
		#menu li { padding: 0 0 0 25px; }
		#menu .sub-menu-spacer { margin-left: 20px; padding-left: 0; }
		.recent-heading-container { max-width: 805px; }
		.element { height: 133px; width: 196px; }
		.element:last-child { display: none; }
	}
	@media (max-width: 950px) {
		.element { height: 133px; margin: 0 0.25%; width: 24.5%; }
		.element:last-child { display: none; }
		.related-posts-home .related-posts-title { width: 43%; }
		.recent-blog-container { margin: 0 auto 50px!important; }
	}
	</style>
	<?php } ?>
	
	<?php if((is_page_template('template-blog.php') or is_archive()) or is_singular('post') or is_search()){ ?>
		<script type="text/javascript">
			function autoResize(e){
				var ele=e.target;
				if(e.which && (e.which == 8 || e.which == 46)){
					ele.style.height="60px";
				}

				if(ele.scrollHeight > jQuery(ele).height()){
					ele.style.height=(ele.scrollHeight+64)+"px";
				}
			}
			function checksubmit(e){
				if(e.which == 10 || e.which == 13){
					var tformsub = jQuery(".header-search-form form");
					if(tformsub.length >= 1){
						tformsub.get(0).submit();
						e.preventDefault();
					}
				}
			}
			jQuery(document).ready(function(){
				jQuery('.header-search').css({ 'display' : 'block' });
				jQuery('.header-search').click(function(){
					jQuery('.header-search-form').css({ 'display' : 'block' });
					jQuery('.s').focus();
					jQuery('textarea').keyup(autoResize);
					jQuery('textarea').keydown(checksubmit);

				});
				jQuery('.header-search-form').click(function(e){
					var target = e.target;

					while (target.nodeType != 1) target = target.parentNode;
					if(target.tagName != 'TEXTAREA'){
						jQuery('.header-search-form').css({ 'display' : 'none' });
					}
				});
			});
		</script>
	<?php } ?>
	
	<?php if((is_page_template('template-blog.php') or is_archive()) or is_singular('post') or is_search()){ ?>
		<style type="text/css">
			#header { display: none; }
			#content { padding-top: 115px; }
			.info-box { display: none; }
			#menu.menu-compact { display: block; }
			@media (max-width: 850px) {
				#header { display: block; }
				#content { padding-top: 25px; }
				#main-nav-compact { z-index: 140; }
			}
			@media (max-width: 1000px) {
				#menu .sub-menu-spacer { margin-left: 0; padding-left: 0; }
			}
		</style>
	<?php } ?>
	<?php if(is_singular('post')){ ?>
		<style type="text/css">
			@media (max-width: 950px) {
				.related-posts-home .related-posts-title { width: 43%; }
				.recent-blog-container { margin: 0 auto 50px!important; }
			}
		</style>
	<?php } ?>
	

<?php if(get_option("flow_featured_slideshow") == 0 AND !$mobile){ ?>
<style type="text/css">
	/* Overflow hidden without cropped images workaround */
	#konzept_slideshow { width:100%; position: relative; z-index: 99; top: 0; height: 330px; overflow: visible; top: -33px; margin-top: -30px; padding-top: 30px; overflow: hidden;  }
	
	#konzept_slideshow * { max-height: 330px; overflow: visible!important; }
	#scroller { float:left; padding: 0 0 0 0; }
	#scroller ul { list-style:none; display:block; float:left; width:27000px; }
	#scroller li { float:left; margin: 0; position: relative; overflow: hidden; }
	#scroller li img { left: 0; margin: auto; max-height: 450px; position: absolute; right: 0; top: -81px; }
	.slideshow-project-excerpt { display: block; left: 0; margin: auto; max-width: 1120px; position: absolute; right: 0; top: 0; width: 92%; z-index: 2; }
	.slideshow-project-title { color: #F8F8F8; font-family: 'Open Sans',Arial,sans-serif; font-size: 65px; line-height: 55px; margin-bottom: 2%; margin-top: 0; width: 100%; word-wrap: break-word; font-weight: 900; width: 38%; }
	.slideshow-project-title-dark { color: #222222; }
	.slideshow-project-desc-dark { color: #464646!important; }
	.imgscontainer { opacity: 0; }
	.project-description-home { font-family: 'Open Sans',Arial,sans-serif; font-weight: 400; font-size: 22px; color: #ffffff; width: 40%; }
	
	.videoBG_wrapper { width: inherit; height; inherit; }
	.videoBG { width: inherit; height; inherit; }
	.videoBG video { }
	.project-more { position: relative; z-index: 3; }
	
	@media (max-width: 1440px) {
		.slideshow-project-title { font-size: 55px; line-height: 45px; margin-bottom: 1%; }
		.project-more { font-size: 26px; margin-top: 5%; }
	}	
	@media (max-width: 1200px) {
		.slideshow-project-title { font-size: 50px; line-height: 42px; }
		.project-description { font-size: 20px; }
		.project-more { font-size: 22px; }
	}	
	@media (max-width: 900px) {
		.slideshow-project-title { font-size: 45px; line-height: 37px; }
		.project-more { font-size: 20px; margin-top: 7%; }
	}
</style>
<?php } ?>
<?php
	/* homepage-slideshow.php */
	$args = array( 'post_type' => 'slideshow' );
	$recent = new WP_Query( $args );
	$button_styles = '<style type="text/css">';
	while($recent->have_posts()) : $recent->the_post();
	
	// Set variables
	if(get_post_meta($post->ID, 'slide-image', true)){ $slide_image = get_post_meta($post->ID, 'slide-image', true); }else{ unset($slide_image); }
	if(get_post_meta($post->ID, 'slide-button-x-offset', true)){ $slide_button_x_offset = get_post_meta($post->ID, 'slide-button-x-offset', true); }else{ $slide_button_x_offset = '0px'; }
	if(get_post_meta($post->ID, 'slide-button-y-offset', true)){ $slide_button_y_offset = get_post_meta($post->ID, 'slide-button-y-offset', true); }else{ $slide_button_y_offset = '0px'; }
	if(get_post_meta($post->ID, 'slide-button-icon', true)){ $slide_button_icon = get_post_meta($post->ID, 'slide-button-icon', true); }else{ unset($slide_button_icon); }
	if(get_post_meta($post->ID, 'slide-color', true)){ $slide_color = get_post_meta($post->ID, 'slide-color', true); }else{ $slide_color = '#00a4a7'; }
	if(get_post_meta($post->ID, 'slide-text-color', true) == '#464646'){ $slide_text_color_title = 'slideshow-project-title-dark'; $slide_text_color_desc = 'slideshow-project-desc-dark'; $slide_button_dark = '#464646'; }else{ unset($slide_text_color_title); unset($slide_text_color_desc); $slide_button_dark = '#f1f1f1'; }
	if(isset($slide_id)){ $slide_id++; }else{ $slide_id = 0; }
	
	//Display slides
	if($slide_image){ $button_styles .='
		#slide_'.$slide_id.' .button {
			position: absolute;
			right: '.$slide_button_x_offset.';
			top: '.$slide_button_y_offset.';
			color: '.$slide_button_dark.'!important;
			font-family: \'Open Sans\', Arial, sans-serif;
			font-weight: 900;
			text-shadow: 0px 2px 2px #fff inset;
			text-shadow: 0px -1px 0px '.hexDarker($slide_color, 8).';
			text-transform: uppercase;
			padding: 0.7em 1em 0.7em;
			-webkit-border-radius: 2em 2em 2em 2em;
			-moz-border-radius: 2em 2em 2em 2em;
			border-radius: 2em 2em 2em 2em;
			background-color: '.$slide_color.';
			background-image: -moz-linear-gradient(center top , rgba(255, 255, 255, 0.75) 0%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0.25) 100%);
			background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.75) 0%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0.25) 100%);
			background-image: linear-gradient(top, rgba(255, 255, 255, 0.75) 0%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0.25) 100%);
			
			/* background: -ms-linear-gradient(top, #ffffff 0%, #ffffff 75%, #ffffff 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'.$slide_color.'", endColorstr="'.hexDarker($slide_color, 8).'",GradientType=0 ); */
		}
		#slide_'.$slide_id.' .button:hover { background-color: '.hexDarker($slide_color, 10).'; text-decoration: none; }';
	?>
	<?php } ?>
	<?php endwhile; wp_reset_query(); ?>
<?php $button_styles .= '</style>'; ?>
<?php echo $button_styles; ?>