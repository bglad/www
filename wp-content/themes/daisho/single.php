<?php get_header(); ?>
<div id="content">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<div class="extended-blog-single-title clearfix">
			<h1><?php if (get_post_meta($post->ID, 'Title', true)) { echo get_post_meta($post->ID, 'Title', true); }else{ the_title(); } ?></h1>
			<?php if(has_tag()){ echo '<div class="extended-blog-meta clearfix">'; } ?><small <?php if(has_tag() or true){ echo 'class="small-has-tag"'; } ?>>
				<div class="extended-blog-comments <?php if(get_comments_number() == '0'){ echo 'extended-blog-comments-zero'; } ?>">
					<div class="extended-blog-comment-icon">c</div>
					<div class="extended-blog-comments-value"><?php comments_popup_link('0', '1', '%'); ?></div>
				</div>
				<?php /* echo date_i18n(get_option('date_format'), strtotime($post->post_date)); */ ?>
				<?php the_time(__('F jS, Y', 'flowthemes')); ?>
			</small>
			<?php if(has_tag()){ echo '</div>'; } ?>
			<?php if(has_tag()){ ?><div class="extended-blog-single-tags"><?php the_tags(' ', ' '); ?></div><?php } ?>
		</div>
	<div class="extended-blog-single-container">
		<?php if (get_post_meta($post->ID, 'blog-full-image', true) and false){ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<img src="<?php echo get_post_meta($post->ID, 'blog-full-image', true); ?>" alt="<?php the_title(); ?>" style="display: block;" />
			</a>
		<?php } ?>
		<?php the_content(); ?>
	</div>
	<div class="extended-blog-container">
		<?php endwhile; ?>
		<div id="comments-template" class="clearfix">
			<?php comments_template(); ?>
		</div>		
	<?php $blog_related_posts = get_option('blog_related_posts'); // 0 = display, 1 = not display
		if($blog_related_posts == 0){ ?>
		<div class="related-posts related-posts-home clearfix">
			<?php wp_reset_query();
			query_posts('posts_per_page=4');
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="related-posts-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><small>
			<?php /* echo date_i18n(get_option('date_format'), strtotime($post->post_date)); */ ?>
			<?php the_time(__('F jS, Y', 'flowthemes')); ?>
			</small></div>
			<?php endwhile; else: _e("No posts found.", 'flowthemes'); endif; wp_reset_query(); ?>
		</div>
	<?php } ?>			
	</div> <!-- /.extended-blog-container -->
	<div class="navigation">
		<div class="alignright older_entries"><?php next_post_link('<div class="older_entries_text">%link </div><div class="older_entries_icon">></div>', __('Next', 'flowthemes')); ?></div>
		<div class="alignleft newer_entries"><?php previous_post_link('<div class="newer_entries_icon"><</div><div class="newer_entries_text"> %link</div>', __('Previous', 'flowthemes')); ?></div>
	</div>
	<?php else: ?>
		<h2 class="center"><?php _e('Not Found', 'flowthemes'); ?></h2>
		<p class="center"><?php _e('Sorry, but you are looking for something that isn\'t here.', 'flowthemes'); ?></p>
	<?php endif; ?>
</div> <!-- /#content -->
<?php get_footer(); ?>