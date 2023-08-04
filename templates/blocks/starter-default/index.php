<?php

/**
 * Default block structure
 * @var [type]
 */

use TheThemeName\Block\Block;

$id = $block['id'];
$preview = $block['data']['preview_image'] ?? '';
$blockName = getBlockName($block['name']);
$className = Block::getBlockClasses($block);
$style = Block::getBlockStyles();
$blockPerRow = Block::getBlockPerRow();
$blockInnerSize = Block::getBlockInnerSize();
$backgroundColor = Block::getBlockBackgroundColor();

// use for when jsx is true in block
// $content = isset($block['supports']['jsx']) && $block['supports']['jsx'] ? '<InnerBlocks />' : '';


// Load values and assign defaults.

// empty block class
// $className .= $conditionHere ? setEmptyClass() : '';

// preview
if (!empty($preview)) {
    get_template_part('templates/parts/components/image', null, [
        'image' => setPreviewImageData($preview),
    ]);
} else { ?>
    <div id="<?php echo esc_attr($id) ?>" class="<?php echo esc_attr($className) ?>" style="<?php echo esc_attr($style) ?>">
        <?php // block content here ?>
    </div>
<?php } ?>
