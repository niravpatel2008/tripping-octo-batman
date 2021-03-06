<?php

class Rox_Panels_Widget_Call_To_Action extends Rox_Panels_Widget  {
	function __construct() {
		parent::__construct(
			__('Call To Action (ROX)', 'so-panels'),
			array(
				'description' => __('A Call to Action block', 'so-panels'),
				'default_style' => 'simple',
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __('Title', 'so-panels'),
				),
				'subtitle' => array(
					'type' => 'text',
					'label' => __('Sub Title', 'so-panels'),
				),
				'button_text' => array(
					'type' => 'text',
					'label' => __('Button Text', 'so-panels'),
				),
				'button_url' => array(
					'type' => 'text',
					'label' => __('Button URL', 'so-panels'),
				),
			)
		);

		// We need the button style
		$this->add_sub_widget('button', __('Button', 'so-panels'), 'Rox_Panels_Widget_Button');
	}
}