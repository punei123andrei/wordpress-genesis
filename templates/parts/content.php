<?php

$hasSidebar = $args['hasSidebar'] ?? false;
$hideHeader = $args['hideHeader'] ?? false;
$contentClass = $hasSidebar ? 'page-content w-sidebar' : 'page-content';

?>

<?php if (!$hideHeader && $hasSidebar) { ?>

    <div class="container">
        <div class="row">
            <div class="d-none d-lg-block col-lg-4 page-sidebar">
                <?php if (is_active_sidebar('page-sidebar')) { ?>
                    <?php dynamic_sidebar('page-sidebar'); ?>
                <?php } ?>
            </div>
            <div class="col-12 col-lg-8 page-content">
                <?php
                while (have_posts()) {
                    the_post();
                    the_content();
                }
                ?>
            </div>
        </div>
    </div>
<?php } else {
    while (have_posts()) {
        the_post();
        the_content();
    }
}
