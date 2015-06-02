<?php 

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="post">
            <?php
            include(locate_template('loop.php'));
            ?>
            </div>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); 

?>
