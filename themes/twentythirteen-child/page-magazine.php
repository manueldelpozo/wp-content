<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="post">
            <?php
            $categories = get_categories(); 
            $do_not_duplicate = array();
            foreach ( $categories as $category ) {
                $args = array( 'post_type' => 'magazine', 'posts_per_page' => 1, 'cat' => $category->term_id, 'post__not_in' => $do_not_duplicate );
                
                $loop = new WP_Query( $args );
                if ( $loop->have_posts() ): ?>
                <section class="<?php echo $category->name; ?> listing">
                    <h4>Newest post in <?php echo $category->name; ?>:</h4>
                <?php
                    while ( $loop->have_posts() ) : $loop->the_post();
                    $do_not_duplicate[] = $post->ID;
                    $link = get_permalink( $id, $leavename );
                    $format = get_post_format( $post_id );
                    $cat = get_the_category( $post_id );
                    //$latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => $cat[0];
                    //if( $latest_cat_post->have_posts() ) : 
                        //while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();
                ?>
                    <a href="<?php echo $link; ?>">
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing' ); ?>>
                            <?php 
                            if ( has_post_thumbnail() ) 
                                the_post_thumbnail( 'thumbnail' );
                            ?>
                            <h3><?php the_title() ?></h3>
                            <div class="entry-content">
                                <?php the_content(); ?>   
                                <?php get_template_part( 'format', $format ); ?> 
                            </div>
                        </article>
                    </a>

                    <?php endwhile; ?>
                </section>
            <?php 
                endif; 
                // Use reset to restore original query.
                wp_reset_postdata();
            }
            ?>
            </div>

		</main><!-- .site-main -->
	</div><!-- .content-area -->


<?php get_footer(); ?>
