<?php

get_header();

// vars here
$hasSidebar = get_field('has_sidebar') ?? false;
$hideHeader = get_field('hide_header') ?? false;

?>
	<main id="content">
        <?php
            if (have_posts()) {
                get_template_part('templates/parts/content', null, [
                    'hasSidebar' => $hasSidebar,
                    'hideHeader' => $hideHeader,
                ]);
            } else {
                get_template_part('templates/parts/content', 'none');
            }
        ?>
	</main><!-- #main -->
<?php
get_footer();
