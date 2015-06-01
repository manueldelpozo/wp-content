<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="post">
            <?php
                $args = array( 'post_type' => 'magazine' );
                $loop = new WP_Query( $args );

                while ( $loop->have_posts() ) : $loop->the_post();
                    $link = get_permalink( $id, $leavename );
                    $format = get_post_format( $post_id );
                    $cat = get_the_category( $post_id );

                    if( $cat[0]->name == 'success' ) :
            ?>
                <a href="<?php echo $link; ?>">
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php 
                        if ( has_post_thumbnail() ) 
                            the_post_thumbnail();
                        ?>
                        <h3><?php the_title() ?></h3>
                        <div class="entry-content">
                            <?php the_content(); ?>   
                            <?php get_template_part( 'format', $format ); ?> 
                        </div>
                    </div>
                </a>
            <?php 
                    endif;
                endwhile; 
            ?>
            </div>

		</main><!-- .site-main -->
	</div><!-- .content-area -->


<?php get_footer(); ?>
