<?php
/* Template Name: Content Slider Page Template */ 
?> 
<?php get_header(); ?>
<script type="text/javascript">
jQuery(document).ready(function(){
jQuery(window).load(function(){
	setTimeout(function(){
		jQuery('.news-image').each(function(){
			jQuery(this).greyScale({
				fadeTime: 200,
				reverse: false
			});
			$(this).animate({ 'opacity' : 1 }, 1000);
			$(this).load(function(){
				jQuery(this).greyScale({
					fadeTime: 200,
					reverse: false
				});
				$(this).animate({ 'opacity' : 1 }, 1000);
			});
			if($(this).complete){
				$(this).trigger('load');
			}
		});
	}, 200);
	});
});
</script>
<style type="text/css">
<?php if($ipad){ ?>
.scrollbar-arrowleft { display: none!important; }
.scrollbar-arrowright { display: none!important; }
<?php } ?>
</style>
<div id="content">
	<div class="page-title"><?php if (get_post_meta($post->ID, 'Title', true)) { ?><?php echo get_post_meta($post->ID, 'Title', true); ?><?php }else{ ?><?php the_title(); ?><?php } ?></div><div class="page_arrow_left">&lt;.</div><div class="page_arrow_right">&gt;.</div><div style="clear:both;"></div>
	<div class="scrollbar-arrowleft scrollbar-arrowleft-inactive" style="display:none;"></div>
	<?php if (get_post_meta($post->ID, 'Description', true)) { ?>
		<div class="page-description"><?php echo get_post_meta($post->ID, 'Description', true); ?></div>
	<?php } ?>
	<?php if($ipad){ ?>
	<style type="text/css">
	.excerpt-blog { margin-right: 1%!important; margin-left: 1%; width: 48%!important; min-height: 300px; }
	.news-title { min-height: 65px; }
	</style>
	<div style="max-width:1140px;width:94%;margin:0 auto;">
	<?php if( have_posts() ) : 
		while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php else : ?>
		<h2 class="center"><?php _e('Not Found', 'flowthemes'); ?></h2>
		<p class="center"><?php _e('Sorry, but you are looking for something that isn\'t here.', 'flowthemes'); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
	</div>
	<?php }else{ ?>
	<div class="news-container-outer">
		<div class="news-container">
			<?php if( have_posts() ) : 
				while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php else : ?>
				<h2 class="center"><?php _e('Not Found', 'flowthemes'); ?></h2>
				<p class="center"><?php _e('Sorry, but you are looking for something that isn\'t here.', 'flowthemes'); ?></p>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</div>
	</div> <!-- /.news-container-outer -->
	<div class="scrollbar-arrowright" style="display:none;"></div>
	<?php } //ipad ?>
</div> <!-- /#content -->
<?php get_footer(); ?>