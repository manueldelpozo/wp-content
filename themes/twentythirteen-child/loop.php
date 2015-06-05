
<?php
    $args = array( 'post_type' => 'magazine' );
    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post();
        $link = get_permalink( $id, $leavename );
        $format = get_post_format( $post_id );
        $cat = get_the_category( $post_id );
        if( $cat[0]->name == $my_category ) :
?>
    <a href="<?php echo $link; ?>">
        <div id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing' ); ?> style="float:left;display:inline;width:30%;border-bottom:5px solid grey;background-color:white;padding:0;margin:1.666%;">
            <?php 
            if ( has_post_thumbnail() ) { 
                $image_id = get_post_thumbnail_id(); 
                $image_url = wp_get_attachment_image_src($image_id,'large'); 
                $image_url = $image_url[0]; 
                echo "<div class='image' style='background: url(".$image_url.") no-repeat center center; background-size:cover; width:100%; height:300px;'></div>";
            }
            ?>
            <h3><center><?php the_title() ?></center></h3>
            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </a>
<?php 
        endif;
    endwhile; 
?>

