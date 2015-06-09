<?php

get_header(); ?>

	<div id="primary" class="content-area" style='background-color:#f7f5e7;border-top:2px solid black;padding20px;'>
		<main id="main" class="site-main" role="main" >
            <div class="post">
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
                    $link_readmore = "../category/".get_the_category( get_the_ID() )[0]->name;
                ?>
                    <a href="<?php echo $link; ?>">
                        <div id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing' ); ?> style="float:left;display:inline;width:30%;height:400px;border-bottom:5px solid grey;background-color:white;padding:0;margin:1.666%;position:relative;">
                            <a href="<?php echo $link_readmore; ?>" style="position:absolute;background-color:white;color:grey;text-transform:uppercase;padding:3px 10px;margin-top:20px;"><?php echo $category->name; ?></a>
                            <?php 
                            if ( has_post_thumbnail() ) { 
                                $image_id = get_post_thumbnail_id(); 
                                $image_url = wp_get_attachment_image_src($image_id,'medium'); 
                                $image_url = $image_url[0]; 
                                echo "<div class='image' style='background: url(".$image_url.") no-repeat center center; background-size:cover; width:100%; height:300px;'>";
                            }
                            ?>
                            </div>
                            <div class="entry-content" style="height:70px;background-color:white;padding:15px;overflow:hidden;position:absolute;bottom:10px;">  
                                <h3 class="title" style="margin-top:0;"><center><?php the_title() ?></center></h3>
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


