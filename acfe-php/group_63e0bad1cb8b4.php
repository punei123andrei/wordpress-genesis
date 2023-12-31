<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_63e0bad1cb8b4',
	'title' => 'Paddings all Blocks',
	'fields' => array(
		array(
			'key' => 'field_63e2098e4ddc2',
			'label' => 'Paddings',
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
			'wpml_cf_preferences' => 3,
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_63e0bad1e2dfe',
			'label' => 'Padding Top',
			'name' => 'block_padding_top',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 3,
			'choices' => array(
				'0px' => '0px',
				'12px' => '12px',
				'24px' => '24px',
				'48px' => '48px',
				'72px' => '72px',
			),
			'default_value' => false,
			'return_format' => 'value',
			'multiple' => 0,
			'allow_null' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'allow_custom' => 0,
			'search_placeholder' => '',
		),
		array(
			'key' => 'field_63e0bad1e2e4d',
			'label' => 'Padding Bottom',
			'name' => 'block_padding_bottom',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 3,
			'choices' => array(
				'0px' => '0px',
				'12px' => '12px',
				'24px' => '24px',
				'48px' => '48px',
				'72px' => '72px',
			),
			'default_value' => false,
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
				'value' => 'all',
			),
			array(
				'param' => 'block',
				'operator' => '!=',
				'value' => 'acf/ase-button',
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