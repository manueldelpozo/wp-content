<?php

get_header(); ?>

	<div id="primary" class="content-area" style='background-color:#f7f5e7;border-top:2px solid black'>
		<main id="main" class="site-main" role="main">
            <div class="post" style="">
            <?php
            $categories = get_categories(); 
            $do_not_duplicate = array();
            foreach ( $categories as $category ) {
                $args = array( 'post_type' => 'magazine', 'posts_per_page' => 1, 'cat' => $category->term_id, 'post__not_in' => $do_not_duplicate );
                
                $loop = new WP_Query( $args );
                if ( $loop->have_posts() ): ?>
                <section class="<?php echo $category->name; ?> listing">
                    
                <?php
                    while ( $loop->have_posts() ) : $loop->the_post();
                    $do_not_duplicate[] = $post->ID;
                    $link = get_permalink( $id, $leavename );
                    $format = get_post_format( $post_id );
                    $cat = get_the_category( $post_id );
                ?>
                    <a href="<?php echo $link; ?>">
                        <div id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing' ); ?> style="float:left;display:inline;width:30%;border-bottom:5px solid grey;background-color:white;padding:0;margin:10px;">
                            <p style="position:absolute;background-color:white;color:grey;text-transform:uppercase;padding:3px 10px;margin-top:20px;"><?php echo $category->name; ?></p>
                            <?php 
                            if ( has_post_thumbnail() ) 
                                the_post_thumbnail( 'large' );
                            ?>
                            <h3><center><?php the_title() ?></center></h3>
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
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
            <div style="clear:both;"></div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->


