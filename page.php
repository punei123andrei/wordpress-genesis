<?php

get_header();

// vars here
$hasSidebar = get_field('has_sidebar') ?? false;
$hideHeader = get_field('hide_header') ?? false;

?>
	<main id="content">
		<?php if (have_posts()) { ?>
			<?php get_template_part('templates/parts/content', get_post_type()); ?>
		<?php } else { ?>
			<?php get_template_part('templates/parts/content', 'none'); ?>
		<?php } ?>
	</main><!-- #main -->
<?php
get_footer();
