
<?php
    $args = array( 'post_type' => 'magazine' );
    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post();
        $link = get_permalink( $id, $leavename );
        $mytitle = wp_trim_words( get_the_title( $post_id ), $num_words = 10, "..." );
        $cat = get_the_category( $post_id );
        if( $cat[0]->name == $my_category ) :
?>
    <a href="<?php echo $link; ?>">
        <div id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing' ); ?> style="float:left;display:inline;width:30%;height:400px;border-bottom:5px solid grey;background-color:white;padding:0;margin:1.666%;position:relative;">
            <?php 
            if ( has_post_thumbnail() ) { 
                $image_id = get_post_thumbnail_id(); 
                $image_url = wp_get_attachment_image_src($image_id,'medium'); 
                $image_url = $image_url[0]; 
                echo "<div class='image' style='background: url(".$image_url.") no-repeat center center; background-size:cover; width:100%; height:300px;'>";
            }
            ?>
            </div>
            <div class="entry-content" style="height:70px;background-color:white;padding:15px;overflow:hidden;position:absolute;bottom:10px">  
                <h3 class="title" style="margin-top:0;"><center><?php echo $mytitle; ?></center></h3>
                <div class="content"><?php the_excerpt(); ?></div>
            </div>
            <div class="read-more" style="height:25px;background-color:white;position:absolute;left:0;bottom:0">      
                <a style="text-transform:uppercase;padding-left:10px;color:#CCC;font-size:0.9em;" href="<?php echo $link_readmore ?>">Read More</a>
            </div>
        </div>
    </a>
    <script type="text/javascript">
        jQuery(".category-listing").bind({ 
            mouseenter: function(){
                jQuery(this).find(".entry-content").animate({"height":"200px"},200);
            },
            mouseleave: function(){
                jQuery(this).find(".entry-content").animate({"height":"70px"},200);
            }
        });
    </script>
<?php 
        endif;
    endwhile; 
?>


