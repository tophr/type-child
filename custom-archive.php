<?php
/**
 * Template Name: Custom Archive
 */

get_header(); ?>
	
	<?php
	/* Blog Options */
	$blog_layout = get_theme_mod('blog_layout', 'list');
	$blog_sidebar_position = get_theme_mod('blog_sidebar_position', 'content-sidebar');
	//$post_template = type_blog_template();
	$post_column = type_blog_column();
	?>
		
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">				
			<div class="entry-header">
				<h1 class="entry-title" style="margin-bottom: 30px;"><?php the_title(); ?></h1>
			</div>
			<div class="entry-content">
				 <?php the_content(); ?>
			</div>		

			<?php 			
			//https://wordpress.stackexchange.com/questions/160175/pagination-on-a-wp-query-not-showing-navigation-links
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args = array(
				'post_per_page' => 10,
				'paged'         => $paged,
			);
			$my_query = new WP_Query( $args );

			global $wp_query;
			// Put default query object in a temp variable
			$tmp_query = $wp_query;
			// Now wipe it out completely
			$wp_query = null;
			// Re-populate the global with our custom query
			$wp_query = $my_query;				

			if ( $my_query->have_posts() ) : ?>

				<section class="row posts-loop <?php if ('grid' == $blog_layout) { echo esc_attr('flex-row'); } ?>">
					<?php /* Start the Loop */
					while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
						<div class="post-wrapper <?php echo $post_column; ?>">
							<?php get_template_part( 'template-parts/post/content' ); ?>
						</div>
					<?php endwhile; ?>				
		
					<?php the_posts_navigation(); ?>	
					
				</section>

			<?php endif; ?>
		</main>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
