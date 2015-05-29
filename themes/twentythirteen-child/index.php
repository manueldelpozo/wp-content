<?php get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
            $args = array( 'post_type' => 'product', 'posts_per_page' => 10 );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
        ?>
                <div class="products">
                    <?php 
                    if ( has_post_thumbnail() ) 
                        the_post_thumbnail();
                    ?>
                    <h3><?php the_title() ?></h3>
                    <div class="entry-content">
                        <?php the_content() ?>
                    </div>
                </div>
        <?php endwhile; ?>
    </main><!-- .site-main -->
</div><!-- .content-area -->
<? get_footer(); ?>