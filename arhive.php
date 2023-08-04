<?php

get_header();

// vars here

?>
	<main id="content">
		<?php if (have_posts()) { ?>
			<?php while (have_posts()) { ?>
                <?php the_post(); ?>
				<?php get_template_part('templates/parts/archive', get_post_type()); ?>
			<?php } ?>
		<?php } else { ?>
			<?php get_template_part('templates/parts/content', 'none'); ?>
		<?php } ?>
	</main><!-- #main -->
<?php
get_footer();
