<?php

/**
 * Template Name: Homepage
 */

get_header();

// vars here

?>
	<main id="content">
    	<?php
            if (have_posts()) {
    			while (have_posts()) {
                    the_post();
    				the_content();
    			}
    		}
        ?>
	</main>
<?php get_footer(); ?>
