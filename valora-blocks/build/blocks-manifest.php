<?php
// This file is generated. Do not modify it manually.
return array(
	'testimonial-slider' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'valora-blocks/testimonial-slider',
		'version' => '0.1.0',
		'title' => 'Testimonial Slider',
		'category' => 'widgets',
		'icon' => 'editor-quote',
		'description' => 'A slider displaying testimonials.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'multiple' => false,
			'align' => true,
			'color' => array(
				'background' => true,
				'text' => true
			)
		),
		'attributes' => array(
			'navigation' => array(
				'type' => 'boolean',
				'default' => true
			),
			'arrowColor' => array(
				'type' => 'string',
				'default' => 'var(--wp--preset--color--primary)'
			)
		),
		'textdomain' => 'testimonial-slider',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	)
);
