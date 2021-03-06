<?php

class Rox_Panels_Widget_Testimonial extends Rox_Panels_Widget  {
	function __construct() {
		parent::__construct(
			__('Testimonial (ROX)', 'so-panels'),
			array(
				'description' => __('Displays a bullet list of elements', 'so-panels'),
				'default_style' => 'simple',
			),
			array(),
			array(
				'name' => array(
					'type' => 'text',
					'label' => __('Name', 'so-panels'),
				),
				'location' => array(
					'type' => 'text',
					'label' => __('Location', 'so-panels'),
				),
				'image' => array(
					'type' => 'text',
					'label' => __('Image', 'so-panels'),
				),
				'text' => array(
					'type' => 'textarea',
					'label' => __('Text', 'so-panels'),
				),
				'url' => array(
					'type' => 'text',
					'label' => __('URL', 'so-panels'),
				),
			)
		);
	}
}