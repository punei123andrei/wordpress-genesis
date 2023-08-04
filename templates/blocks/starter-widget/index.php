<?php

/**
 * Ase Widget Block
 * @var [type]
 */

use TheThemeName\Block\Block;
use TheThemeName\Widget\Widget;

$id = $block['id'];
$preview = $block['data']['preview_image'] ?? '';
$blockName = getBlockName($block['name']);
$className = Block::getBlockClasses($block);
$blockPerRow = Block::getBlockPerRow();
$style = Block::getBlockStyles();
$showWidget = Widget::showWidgetIn($block);

// Load values and assign defaults.
$content = isset($block['supports']['jsx']) && $block['supports']['jsx'] ? '<InnerBlocks />' : '';

// TODO: empty block class

// preview
if (!empty($preview)) {
    get_template_part('templates/parts/components/image', null, [
        'image' => setPreviewImageData($preview),
    ]);
} else { ?>
    <?php if ($showWidget) { ?>
        <div class="block-widget">
            <div id="<?php echo esc_attr($id) ?>" class="<?php echo esc_attr($className) ?>" style="<?php echo esc_attr($style) ?>">
                <div class="inner-blocks">
                    <?php echo $content ?>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>
