<?php get_header(); ?>
<?php /* '0' => 'Full Width', '1' => 'Left Sidebar', '2' => 'Right Sidebar', '3' => 'Double Left Sidebar', '4' => 'Double Right Sidebar', '5' => 'Both Sides Sidebars' */ ?>
<?php $page_layout = get_post_meta($post->ID, 'page_layout', true); ?>
<?php if(post_password_required()){ echo '<div class="password-protected-page">'.get_the_password_form().'</div>'; }else{ ?>
<div id="content" class="page-template-main-container">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<?php if (get_post_meta($post->ID, 'Title', true)) { ?>
			<h1 class="page-title"><?php echo get_post_meta($post->ID, 'Title', true); ?></h1>
		<?php } ?>
		<?php if (get_post_meta($post->ID, 'Description', true)) { ?>
			<div class="page-description"><?php echo get_post_meta($post->ID, 'Description', true); ?></div>
		<?php } ?>
		<?php if(($page_layout == 0) or ($page_layout == '')){ ?><div class="page-content full-width-page full-width-page-content clearfix container_12"><?php the_content(); ?></div><?php } ?>
		<?php if($page_layout == 2){ ?><div class="page-content right-sidebar-page clearfix container_12"><div class="grid_9 right-sidebar-page-content" style="margin-left: 0; margin-right: 2%;"><?php the_content(); ?></div><div class="grid_3 right-sidebar-page-sidebar" style="position:relative;"><div class="sidebar-left-shadow"></div><div style="margin-left:15%;"><?php get_sidebar(); ?></div></div></div><?php } ?>
		<?php if($page_layout == 1){ ?><div class="page-content left-sidebar-page clearfix container_12"><div class="grid_3 left-sidebar-page-sidebar" style="position:relative;"><div class="sidebar-right-shadow"></div><div style="margin-right:15%;"><?php get_sidebar(); ?></div></div><div class="grid_9 left-sidebar-page-content" style="margin-left: 2%; margin-right: 0;"><?php the_content(); ?></div></div><?php } ?>
	<?php endwhile ?>	
		<div id="posts_navigation">
			<?php posts_nav_link(' ', __('Previous page', 'flowthemes'), __('Next page', 'flowthemes')); ?>
		</div>
	<?php else : ?>
		<h2 class="center"><?php _e('Not Found', 'flowthemes'); ?></h2>
		<p class="center"><?php _e('Sorry, but you are looking for something that isn\'t here.', 'flowthemes'); ?></p>
		<?php get_search_form(); ?>	
	<?php endif; ?>
</div>
<?php } /* Password Protected Page if() */ ?>
<?php get_footer(); ?>