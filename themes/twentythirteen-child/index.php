<?php
get_header();
echo "hola";
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
            $args = array( 'post_type' => 'product' );

        ?>
                <div class="products">

                    <h3><?php the_title() ?></h3>
                    <p><?php the_content() ?></p>
                </div>

    </main><!-- .site-main -->
</div><!-- .content-area -->
<?
get_footer();
 ?>