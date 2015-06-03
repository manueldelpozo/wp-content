<?php 
function filter_category( $cat ) {
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="post">
            <?php
                $args = array( 'post_type' => 'magazine' );
                $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => $args;
                if( $latest_cat_post->have_posts() ) : 
                    while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();
                //$loop = new WP_Query( $args );

                //while ( $loop->have_posts() ) : $loop->the_post();
                        $link = get_permalink( $id, $leavename );
                        $format = get_post_format( $post_id );
                        $cat = get_the_category( $post_id );

                        if( $cat[0]->name == $cat ) :
            ?>
                <a href="<?php echo $link; ?>">
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php 
                            if ( has_post_thumbnail() ) 
                                the_post_thumbnail();
                        ?>
                        <h3><?php the_title() ?></h3>
                        <div class="entry-content">
                            <?php the_content(__('(more…)')); ?>   
                            <?php get_template_part( 'format', $format ); ?> 
                        </div>
                    </div>
                </a>
            <?php 
                        endif;
                    endwhile; 
                endif;
            ?>
            </div>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); 
}
?>
