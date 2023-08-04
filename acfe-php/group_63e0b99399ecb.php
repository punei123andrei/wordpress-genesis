<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_63e0b99399ecb',
	'title' => 'Block Size all Blocks',
	'fields' => array(
		array(
			'key' => 'field_63e20a8a350c4',
			'label' => 'Block Layout',
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
			'key' => 'field_63e0b1dce82b9',
			'label' => 'Block size',
			'name' => 'block_size',
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
				'container' => 'Boxed',
				'container-fluid' => 'Full Width',
			),
			'default_value' => 'container',
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
			'key' => 'field_63e3a806da8f3',
			'label' => 'Block inner size',
			'name' => 'block_inner_size',
			'type' => 'select',
			'instructions' => 'This option controls the inner column width of this element and it not depends on Block size. Default is to Full Width',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 3,
			'choices' => array(
				'col-12 col-xl-6 offset-xl-3' => 'Small',
				'col-12 col-xl-8 offset-xl-2' => 'Medium',
				'col-12 col-xl-10 offset-xl-1' => 'Large',
				'col-12' => 'Full Width',
			),
			'default_value' => 'col-12',
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
				'value' => 'acf/ase-homepage-hero',
			),
		),
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/ase-super',
			),
		),
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/ase-rich-editor',
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