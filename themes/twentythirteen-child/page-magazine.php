<?php

get_header(); ?>

	<div id="primary" class="content-area" style='background-color:#f7f5e7;border-top:2px solid black;padding20px;'>
		<main id="main" class="site-main" role="main" >
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
                ?>
                    <a href="<?php echo $link; ?>">
                        <div id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing' ); ?> style="float:left;display:inline;width:30%;border-bottom:5px solid grey;background-color:white;padding:0;margin:1.666%;">
                            <p style="position:absolute;background-color:white;color:grey;text-transform:uppercase;padding:3px 10px;margin-top:20px;"><?php echo $category->name; ?></p>
                            <?php 
                            if ( has_post_thumbnail() ) { 
                                $image_id = get_post_thumbnail_id(); 
                                $image_url = wp_get_attachment_image_src($image_id,'medium'); 
                                $image_url = $image_url[0]; 
                                echo "<div class='image' style='background: url(".$image_url.") no-repeat center center; background-size:cover; width:100%; height:300px;'>";
                            }
                            ?>
                                <div class="content" style="display:none;background-color:white;"><?php the_excerpt(); ?></div>
                            </div>
                            <div class="slide">
                                
                                <h3 class="title"><center><?php the_title() ?></center></h3>
                            </div>
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </a>

                    <script type="text/javascript">
                        jQuery(".slide").bind({ 
                            mouseenter: function(){
                                jQuery(this).parent().find(".content").slideDown();
                            },
                            mouseleave: function(){
                                jQuery(this).parent().find(".content").slideUp();
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


