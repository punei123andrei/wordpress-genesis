<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_63e6425d8d041',
	'title' => 'Items per row all Blocks',
	'fields' => array(
		array(
			'key' => 'field_63e64506327d1',
			'label' => 'Items per row',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_63e4bb7a132ee',
			'label' => 'How many items per row to display?',
			'name' => 'block_per_row',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 2,
			'choices' => array(
				'col-12' => '1 item',
				'col-12 col-lg-6' => '2 items',
				'col-12 col-lg-4' => '3 items',
				'col-12 col-lg-3' => '4 items',
			),
			'default_value' => 'col-12 col-xl-4',
			'return_format' => 'value',
			'multiple' => 0,
			'allow_null' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'allow_custom' => 0,
			'search_placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/ase-variable-box',
			),
		),
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/ase-simple-coloured-box-listing',
			),
		),
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/ase-numbers',
			),
		),
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/ase-faculty-box-listing',
			),
		),
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/ase-image-text',
			),
		),
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/ase-post-listing',
			),
		),
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/ase-images-gallery',
			),
		),
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/ase-files',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
	'acfe_display_title' => '',
	'acfe_autosync' => array(
		0 => 'php',
	),
	'acfe_form' => 0,
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1678740722,
	'acfml_field_group_mode' => 'advanced',
));

endif;