<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<main id="main" class="site-main" role="main">
			<div class="page-title"><?php the_title() ?></div>

			<?php
			$args = array( 'post_type' => 'product' );
			$second_loop = new WP_Query( $args ); 
			// Start the loop.
			if ( $second_loop -> have_posts() ) : the_post();
				while ( $second_loop -> have_posts() ) : $second_loop -> the_posts();
				?>
				<div class="products">
					<?php 
					if ( has_post_thumbnail() ) 
						the_post_thumbnail();
					?>
					<h3><?php the_title() ?></h3>
					<p><?php the_content() ?></p>
				</div>
				<?php
				endwhile;// End the second loop.
			endif;
			wp_reset_postdata();
			?>

		</main><!-- .site-main -->

		<?php endif; endwhile; ?>
	</div><!-- .content-area -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>