<?php get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="products">
        <?php
            $args = array( 'post_type' => 'product', 'posts_per_page' => 10 );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
                $link = get_permalink( $id, $leavename );
                $format = get_post_format( $post_id );
        ?>
            <a href="<?php echo $link; ?>">
                <div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
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
        <?php endwhile; ?>
        </div>
        <div class="popup">
        <?php
        $custom_terms = get_terms('custom_taxonomy');
        foreach($custom_terms as $custom_term) {
            wp_reset_query();
            $args = array('post_type' => 'custom_post_type',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'custom_taxonomy',
                        'field' => 'slug',
                        'terms' => $custom_term->slug,
                    ),
                ),
            );
            $loopTax = new WP_Query( $args );
            while ( $loopTax->have_posts() ) : $loopTax->the_post();
                $link = get_permalink( $id, $leavename );
                $format = get_post_format( $post_id );
        ?>
            <a href="<?php echo $link; ?>">
                <div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
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
        <?php endwhile; 
        }
        ?>
        </div>
    </main><!-- .site-main -->
</div><!-- .content-area -->
<? get_footer(); ?>