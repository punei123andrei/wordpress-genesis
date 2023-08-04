<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_63f77b99879e1',
	'title' => 'Widget controls',
	'fields' => array(
		array(
			'key' => 'field_63f78e2d2d296',
			'label' => 'Show in',
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
			'key' => 'field_641896e2b2dd6',
			'label' => 'Where to show?',
			'name' => 'show_in',
			'type' => 'select',
			'instructions' => 'If nothing is selected, this widget will be displayed everywhere.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '100',
				'class' => 'widget-page-selector',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'choices' => array(
			),
			'default_value' => array(
			),
			'return_format' => 'value',
			'multiple' => 1,
			'allow_custom' => 0,
			'placeholder' => '',
			'allow_null' => 1,
			'ui' => 1,
			'ajax' => 1,
			'search_placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/ase-widget',
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
	'acfml_field_group_mode' => 'advanced',
	'acfe_form' => 0,
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1679343424,
));

endif;