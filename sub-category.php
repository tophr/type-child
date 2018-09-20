<?php
/*
 * Template Name: Sub-Category
 *
 * @package Type
 * @since Type 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php if ( get_theme_mod('page_style', 'fimg-classic') == 'fimg-fullwidth' ) : ?>
		
		<div class="entry-header">
			<?php the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>
		</div>
			
		<?php if ( has_post_thumbnail() && get_theme_mod('page_has_featured_image', 1) ) : ?>
			<figure class="entry-thumbnail">
				<?php the_post_thumbnail('type-fullwidth'); ?>
			</figure>
		<?php endif; // Featured Image ?>
		
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			 <?php 
			  $args = array(
				  'parent' => $post->ID,
				  'post_type' => 'page',
				  'post_status' => 'publish'
			  ); 
			  $pages = get_pages($args);  ?>
			  <div class="row page-thumbs"> 
			  <?php foreach( $pages as $page ) { ?>
			   <div class="col-sm-6">
				  <a href="<?php echo  get_permalink($page->ID); ?>" rel="bookmark" title="<?php echo $page->post_title; ?>">
					  <span class="thumbnail"><?php echo get_the_post_thumbnail($page->ID, 'type-medium'); ?></span>
					  <h3 class="title"><?php echo $page->post_title; ?></h3>
					  <span class="desc"><?php echo $page->post_excerpt; ?></span>
				  </a>
			  </div>
			  <?php } ?>
			  </div>
			
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php endif; ?>

<?php get_footer(); ?>